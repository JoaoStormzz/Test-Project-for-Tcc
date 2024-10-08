<!DOCTYPE html>
<html>
<head>
  <title>Centralized Button</title>
  <style>
    body {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }

    button {
      padding: 15px 30px;
      font-size: 16px;
      background-color: #4CAF50;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }
  </style>
</head>
<body>
  <button id="test">Teste</button>
  <script src="build/sweetalert.js"></script>

  <script>
    const testButton = document.querySelector('#test'); // Corrected ID

    testButton.addEventListener('click', function() {
      Swal.fire({
        title: "Good job!",
        text: "You clicked the button!",
        icon: "success"
      });
    });
  </script>
</html>