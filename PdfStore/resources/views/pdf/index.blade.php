<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Your Website</title>
  <!-- Add Bootstrap CSS link here -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<!-- Navigation Bar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Your Website</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="#welcome">Welcome</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#about">About Us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#features">Our Features</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#contact">Contact</a>
      </li>
    </ul>
  </div>
</nav>

<!-- Welcome Section -->
<section id="welcome" class="container">
  <h1>Welcome to Your Website</h1>
  <p>This is the welcome section of your website.</p>
</section>

<!-- About Us -->
<section id="about" class="container">
  <h2>About Us</h2>
  <p>Learn more about our company and what we do.</p>
</section>

<!-- Our Features -->
<section id="features" class="container">
  <h2>Our Features</h2>
  <p>Discover the great features we offer to our users.</p>
</section>

<!-- Contact Box -->
<section id="contact" class="container">
  <h2>Contact Us</h2>
  <form>
    <div class="form-group">
      <label for="name">Name</label>
      <input type="text" class="form-control" id="name">
    </div>
    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" class="form-control" id="email">
    </div>
    <div class="form-group">
      <label for="message">Message</label>
      <textarea class="form-control" id="message" rows="4"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</section>

<!-- Footer -->
<footer class="container text-center">
  &copy; 2023 Your Website. All rights reserved.
</footer>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

