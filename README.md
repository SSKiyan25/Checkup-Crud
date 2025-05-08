<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About the Project

This project is a very simple Laravel-based application that focuses on implementing back-end features for managing cities, barangays (brgys), patients, and generating reports. The primary objective of this project is to demonstrate back-end functionality, so no front-end design has been implemented.

---

## Key Features

### 1. **City CRUD**

-   Create, Read, Update, and Delete operations for managing cities.

### 2. **Brgys CRUD**

-   Create, Read, Update, and Delete operations for managing barangays.

### 3. **Patient CRUD**

-   Create, Read, Update, and Delete operations for managing patient records.

### 4. **Reports**

#### **Awareness Report**

-   Generate reports showing the total number of:
    -   Persons Under Investigation (PUI)
    -   Persons Under Monitoring (PUM)
    -   Positive on Covid
    -   Negative on Covid
-   Reports are filtered by city and barangay.

#### **Corona Virus Report**

-   Generate reports showing the total number of:
    -   Active cases
    -   Recovered cases
    -   Deaths
-   Reports are filtered by city and barangay.

---

## Advanced Features

### 1. **Patient Check Status**

-   Allows patients to check their status (PUI, PUM, Positive on Covid, Negative on Covid) by entering their contact number.
-   The status is displayed instantly using preloaded patient data, ensuring fast response times.
-   This feature is optimized for small datasets and avoids repeated server requests.

### 2. **Auto Email**

-   Automatically sends an email notification to a patient when their case type is updated.
-   The email includes details about the old and new case type.
-   If the patient does not have an email address, no notification is sent, and a proper message is displayed to the user.

---

## Notes

-   This project focuses solely on back-end functionality. No front-end design or styling has been implemented.
-   The application is built using Laravel, leveraging its powerful features like Eloquent ORM, validation, and notifications.

---

## How to Run the Project

1. Clone the repository:
    ```bash
    git clone git@github.com:SSKiyan25/Checkup-Crud.git
    cd Checkup-Crud
    ```
