Weather App

A Laravel web application that fetches real-time weather data from the OpenWeatherMap API, displays it in a clean card-based UI, and stores historical weather records in a MySQL database for date-based retrieval.

Features
	∙	Live weather data — fetches current weather for predefined cities (London, Tokyo, Paris, New York, Berlin) on load
	∙	City search — search for current weather by entering any city name
	∙	Weather by date — retrieve stored weather records for any past date from the local database
	∙	Data persistence — every weather fetch is stored to a MySQL database, building a historical record over time
	∙	Weather detail cards — displays temperature, min/max, humidity, pressure, wind speed, and weather condition with icons

Tech Stack
	∙	Backend — PHP, Laravel
	∙	Frontend — Blade, Bootstrap, Font Awesome
	∙	Database — MySQL
	∙	External API — OpenWeatherMap API (Geocoding + Current Weather endpoints)

How It Works
	1.	On load, the app calls the OpenWeatherMap Geocoding API to resolve city names to coordinates
	2.	Coordinates are used to fetch current weather data from the Current Weather API
	3.	Weather data is mapped to a structured collection and persisted to the database
	4.	Users can search for any city or retrieve historical records by selecting a specific date

Setup Requirements
	∙	PHP 8+
	∙	Composer
	∙	MySQL
	∙	OpenWeatherMap API key (free tier) — get one here

Notes
	∙	This project was built as a portfolio piece demonstrating Laravel, external API integration, and MySQL persistence
	∙	Weather data is fetched live on each request and stored — repeated fetches for the same city build a historical record queryable by date
	∙	Built and tested with Laravel 10

Author
Glenn Ansah — Full Stack Software Developer
	∙	Email: ansahglenn@gmail.com
	∙	GitHub: github.com/nanaglenn
