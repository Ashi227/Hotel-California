<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: index.html");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Aurum Suites</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #1c1c1c;
            position: relative;
        }

        .video-background {
            position: absolute;
            top: 56px;
            left: 0;
            width: 100%;
            height: calc(100vh - 56px);
            object-fit: cover;
            z-index: -1;
        }

        .overlay {
            position: absolute;
            top: 56px;
            left: 0;
            width: 100%;
            height: calc(100vh - 56px);
            background: rgba(0, 0, 0, 0.5);
            z-index: 1;
        }

        .hero-content {
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: calc(100vh - 56px);
            text-align: center;
            color: white;
            z-index: 2;
        }

        .hero-content h1 {
            font-size: 5rem;
            margin-bottom: 1rem;
            background: linear-gradient(90deg, #d4af37, #f1c40f);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .hero-content p {
            font-size: 1.5rem;
            margin-bottom: 2rem;
        }

        .below-video {
            position: relative;
            z-index: 1;
            background-color: #f9f9f9;
            padding: 4rem;
            text-align: center;
        }

        .info-box {
            background-color: #f1f1f1;
            padding: 1.5rem;
            margin-top: 1.5rem;
            border-radius: 8px;
            display: inline-block;
            font-size: 1.1rem;
            color: #777;
            width: 50%;
        }

        footer {
            color: white;
            background-color: #1c1c1c;
            text-align: center;
            padding: 10px 0;
        }

        #changing-text {
            transition: opacity 0.5s ease-in-out;
        }

        .book-box form {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            align-items: end;
            gap: 1rem;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="position: relative; z-index: 3;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="image2.png" alt="Logo" width="30" height="30" />
                Aurum Suites
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item"><a class="nav-link active" href="#">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="About.html">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="Rooms.html">Rooms & Suites</a></li>
                    <li class="nav-item"><a class="nav-link" href="Lounge.html">Lounge</a></li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" />
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="video-section">
        <video class="video-background" autoplay loop muted playsinline>
            <source src="montageht.mp4" type="video/mp4" />
        </video>
        <div class="overlay"></div>
        <div class="hero-content">
            <h1>Aurum Suites</h1>
            <p id="changing-text">Your Golden Escape Awaits</p>

            <div class="book-box">
                <h3>Book Your Stay</h3>
                <form action="book.php" method="POST">
                    <label>Location</label>
                    <select class="form-control mb-2" name="location" required>
                        <option>Manila</option>
                        <option>Cebu</option>
                        <option>Baguio</option>
                        <option>Tagaytay</option>
                    </select>
                    <label>Check-In</label>
                    <input type="date" class="form-control mb-2" name="checkin_date" required>
                    <label>Nights</label>
                    <input type="number" class="form-control mb-3" name="nights" min="1" value="1" required>
                    <button type="submit" class="btn btn-warning w-100">Book Now</button>
                </form>
            </div>
        </div>
    </div>

    <div class="below-video">
        <h2>WELCOME TO AURUM SUITES</h2>
        <p>EXPERIENCE THE GOLDEN STANDARD</p>
        <div class="info-box">
            Step into a serene retreat designed for both comfort and class. Surrounded by elegance and warmth, Aurum
            Suites
            offers a perfect balance of relaxation and sophistication.
        </div>
    </div>

    <footer>
        <p>AurumSuites &copy; 2025</p>
    </footer>

    <script>
        const textElement = document.getElementById("changing-text");
        const phrases = [
            "Experience the Golden Standard",
            "Your Golden Escape Awaits",
            "Where Luxury Shines Bright",
            "Stay in the Glow of Elegance",
            "Redefining Modern Comfort"
        ];

        let index = 0;

        function changeText() {
            // Fade out
            textElement.style.opacity = 0;

            setTimeout(() => {
                index = (index + 1) % phrases.length;
                textElement.textContent = phrases[index];
                // Fade in
                textElement.style.opacity = 1;
            }, 500);
        }

        // Change every 4 seconds
        setInterval(changeText, 2000);
    </script>


</body>

</html>