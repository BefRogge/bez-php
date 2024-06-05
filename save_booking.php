if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $date = $_POST['date'];
        $time = $_POST['time'];
        $guests = $_POST['guests'];
    
        // З'єднання з базою даних (налаштуйте підключення до вашої бази даних)
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "cafe";
    
        // Створення з'єднання
        $conn = new mysqli($servername, $username, $password, $dbname);
    
        // Перевірка з'єднання
        if ($conn->connect_error) {
            die("Помилка підключення: " . $conn->connect_error);
        }
    
        $sql = "INSERT INTO bookings (name, email, date, time, guests) VALUES ('$name', '$email', '$date', '$time', '$guests')";
    
        if ($conn->query($sql) === TRUE) {
            echo "Дякуємо, $name! Ваше бронювання підтверджено. Ми чекаємо вас $date о $time. Кількість гостей: $guests. Підтвердження надіслано на: $email.";
        } else {
            echo "Помилка: " . $sql . "<br>" . $conn->error;
        }
    
        $conn->close();
    }
    ?>