# Prophet Calculator - Christian Mathematical Tool & Online Sanctuary

![Project Logo](resources/Jesus.png) 

## Overview
A unique integration of mathematical computation and Christian spirituality, featuring:
- **C++ Desktop Application**: Gaussian elimination solver with Bible knowledge assessment
- **PHP Web Portal**: Online candle dedication system and project information hub
- **Faith-Driven Features**: Thematic design elements and spiritual engagement tools

## Key Features

### Desktop Application (C++/WinForms)
- **Linear Algebra Core**
  - Matrix-based input system for 5x5 equations
  - Step-by-step Gaussian elimination solver
  - Local result storage (.txt export)
  
- **Spiritual Assessment**
  - 20-question Bible knowledge test
  - Faith Tier System:
    - 90-100: True Christian
    - 70-89: Believer
    - 50-69: Seeker
    - 30-49: Doubter
    - 0-29: Atheist

### Web Portal (PHP/MySQL)
- **Spiritual Components**
  - Live candle wall updates

- **Technical Components**
  - Client/Server Architecture:
    - Apache 2.4+ | PHP 7.4+ | MySQL 5.6+
    - RESTful API endpoints

## Technical Specifications

## API Documentation

### Endpoint: `/api/get-candles.php`
**GET** Request
```bash
curl -X GET "https://domain.com/api/get-candles.php"
```
Response Schema:
```json
{
    "status" : "success",
    "message" : "Свечки были получены",
    "records" : [
    {
      "id": 2,
      "caption": "За счастливое будущее",
      "name": "Мария/Джамал"
    },
    {
      "id": 1,
      "caption": "За здоровье",
      "name": "Яромир"
    }
    ]
}
```

### Endpoint: `/api/send-candle.php`
**POST** Request
```bash
curl -X POST -H "Content-Type: application/json" \
  -d '{"caption":"Health","name":"John"}' \
  "https://domain.com/api/send-candle.php"
```
Validation Rules:
- Caption: 100 char max
- Recipient: 50 char max

## Installation Guide

### Web Server Setup
1. Clone repository:
   ```bash
   git clone https://github.com/ManoKiku/ProrokSite.git
   ```
2. Configure `Config.php`:
   ```php
   define("DB_HOST", "your_db_host");
   define("DB_USER", "encrypted_user");
   define("DB_PASS", "aes-256-cbc_encrypted");
   define("DB_NAME", "prophet_db");
   ```
3. Initialize database:
   ```sql
   CREATE TABLE candles (
    id int(11) NOT NULL,
     caption varchar(100) NOT NULL,
     name varchar(50) NOT NULL
   );

   CREATE TABLE rate_limit (
   ip varchar(45) NOT NULL,
   last_access timestamp NOT NULL,
   request_count int(11) DEFAULT '0'
   );
   ```