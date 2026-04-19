# Weather Application (Laravel)

A Laravel-based weather application that fetches real-time weather data from the OpenWeather API, processes it, and stores it in a database for retrieval and analysis.

---

## Features

* Fetches real-time weather data for multiple cities using OpenWeather API
* Converts city names into geographic coordinates (latitude & longitude)
* Retrieves detailed weather information including:

  * Temperature (current, min, max)
  * Weather conditions and descriptions
  * Humidity and pressure
  * Wind speed
* Stores weather data in a database for historical tracking
* Search weather data by specific date
* Search weather by city name
* Displays recent weather updates

---

## How It Works

1. **City Input**

   * Accepts predefined or user-input city names

2. **Geolocation API**

   * Converts city names into latitude and longitude using OpenWeather Geocoding API

3. **Weather API**

   * Fetches detailed weather data using coordinates

4. **Data Processing**

   * Extracts and structures relevant weather information

5. **Database Storage**

   * Saves weather data into a MySQL database for persistence

6. **Data Retrieval**

   * Allows querying stored weather data by date or city

---

## Tech Stack

* **Backend:** Laravel (PHP)
* **Database:** MySQL
* **API:** OpenWeather API
* **HTTP Client:** Laravel HTTP Client
* **Frontend:** Blade Templates

---

## Key Functionalities

### Weather Fetching

* Retrieves weather data for multiple cities
* Handles API responses and data transformation

### Data Storage

* Stores structured weather data in a relational database

### Search & Filtering

* Search weather data by:

  * City name
  * Specific date
---

## Notes

* This project demonstrates:

  * API integration
  * Data processing and transformation
  * Database design and interaction
  * Backend system logic

---

## Author

Glenn Ansah
Full-Stack Developer (Laravel Focused)
