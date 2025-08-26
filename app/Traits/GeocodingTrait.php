<?php

namespace App\Traits;

use Illuminate\Support\Facades\Http;
use App\Constants\ApiConstants; // Import the new ApiConstants file

trait GeocodingTrait
{
    /**
     * Get location details based on latitude and longitude.
     *
     * @param  string  $latitude
     * @param  string  $longitude
     * @return array|null Returns an array of location details or null on failure.
     */
    protected function getCoordinatesLocation(string $latitude, string $longitude): ?array
    {
        // Temporarily set cURL and OpenSSL CA info to bypass php.ini issues
        ini_set('curl.cainfo', 'C:/wamp64/bin/php/php8.3.14/extras/ssl/cacert.pem');
        ini_set('openssl.cafile', 'C:/wamp64/bin/php/php8.3.14/extras/ssl/cacert.pem');

        $nominatimUrl = ApiConstants::NOMINATIM_BASE_URL . "&lat={$latitude}&lon={$longitude}";

        try {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $nominatimUrl);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Explicitly disable SSL verification
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); // Explicitly disable SSL verification
            curl_setopt($ch, CURLOPT_USERAGENT, ApiConstants::GEOCoding_USER_AGENT); // Use constant
            curl_setopt($ch, CURLOPT_REFERER, config('app.url')); // Add Referer header

            $response = curl_exec($ch);
            $error = curl_error($ch);
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

            if ($response === false) {
                // \Log::error(ApiConstants::GEOCoding_ERROR_CONNECT, ['error' => $error]);
                return null;
            }

            $data = json_decode($response, true);

            if ($httpCode >= 200 && $httpCode < 300 && !empty($data)) {
                $formattedAddress = $data['display_name'] ?? 'N/A';
                $address = $data['address'] ?? [];
                $city = $address['city'] ?? $address['town'] ?? $address['village'] ?? null;
                $country = $address['country'] ?? null;
                $postalCode = $address['postcode'] ?? null;

                return [
                    'latitude' => $latitude,
                    'longitude' => $longitude,
                    'formatted_address' => $formattedAddress,
                    'city' => $city,
                    'country' => $country,
                    'postal_code' => $postalCode,
                ];
            } else {
                // \Log::warning(ApiConstants::GEOCoding_ERROR_NO_LOCATION, ['http_code' => $httpCode, 'response' => $data]);
                return null;
            }
        } catch (\Exception $e) {
            // \Log::error(ApiConstants::GEOCoding_ERROR_EXCEPTION, ['error' => $e->getMessage()]);
            return null;
        }
    }
}
