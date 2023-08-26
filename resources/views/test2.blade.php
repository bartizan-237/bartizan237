<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #f5f5f5;
        }

        .search-container {
            position: relative;
            width: 300px;
        }

        .search-input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 25px;
            outline: none;
            font-size: 16px;
            transition: border-color 0.3s ease-in-out;
        }

        .search-input:focus {
            border-color: #3498db;
        }

        .search-button {
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 25px;
            padding: 8px 15px;
            cursor: pointer;
            font-size: 14px;
            transition: background-color 0.3s ease-in-out;
        }

        .search-button:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
<div class="search-container">
    <input type="text" class="search-input" placeholder="검색어를 입력하세요">
    <button class="search-button">검색</button>
</div>
</body>
</html>
