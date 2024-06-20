<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental Motor</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js" integrity="sha512–16esztaSRplJROstbIIdwX3N97V1+pZvV33ABoG1H2OyTttBxEGkTsoIVsiP1iaTtM8b3+hu2kB6pQ4Clr5yug==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   
</head>
<body>
    <div class="container">
        <h1>Rental Motor</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <td>
            <label for="nama-pelanggan">Nama Pelanggan:</label>
            <input type="text" id="nama-pelanggan" name="nama_pelanggan" required>
        </td>
            <label for="lama-rental">Lama Waktu Rental (per hari):</label>
            <input type="number" id="lama-rental" name="lama_rental" min="1" required>
        <td>  
            <label for="jenis-motor">Jenis Motor:</label>
            <select id="jenis-motor" name="jenis_motor" required>
                <option value="Vespa Matic">Vespa Matic</option>
                <option value="Motor Listrik">Motor Listrik</option>
                <option value="CBR">CBR</option>
                <option value="Vario">Vario</option>
            </select>
        </td>
        <td>
            <button type="submit" name="submit">Submit</button>
        </td>
        </form>

        <style>
            
        body, h1, h2, p, label, input, select, button, div {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }


        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }


        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            text-align: center;
        }


        h1 {
            margin-bottom: 20px;
            color: #0056b3;
        }


        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        label {
            text-align: left;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="number"],
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 1rem;
        }

        input[type="text"]:focus,
        input[type="number"]:focus,
        select:focus {
            border-color: #0056b3;
            outline: none;
        }

        /* Button styling */
        button {
            padding: 10px 15px;
            background-color: #0056b3;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 1rem;
            cursor: pointer;
        }

        button:hover {
            background-color: #003d7a;
        }

        /* Output section styling */
        .output {
            margin-top: 20px;
            text-align: left;
        }

        .output h2 {
            margin-bottom: 10px;
            color: #0056b3;
        }

        .output p {
            margin-bottom: 5px;
            font-size: 1rem;
        }

        </style>
        <?php
        class MotorRental {
            private $nama_pelanggan;
            private $lama_rental;
            private $jenis_motor;
            private $diskon;
            private $harga_per_hari;
            private $pajak;

            public function __construct($nama_pelanggan, $lama_rental, $jenis_motor) {
                $this->nama_pelanggan = $nama_pelanggan;
                $this->lama_rental = $lama_rental;
                $this->jenis_motor = $jenis_motor;
                $this->diskon = 0;
                $this->harga_per_hari = 70000;
                $this->pajak = 10000;

                if ($nama_pelanggan == 'ana') {
                    $this->diskon = 0.05;
                }
            }

            public function calculateTotal() {
                $total = ($this->lama_rental * $this->harga_per_hari) - (($this->lama_rental * $this->harga_per_hari) * $this->diskon);
                return $total + $this->pajak;
            }

            public function displayOutput() {
                echo "<div class='output'>";
                echo "<h2>Rental Motor</h2>";
                echo "<p>Nama Pelanggan: {$this->nama_pelanggan}</p>";
                echo "<p>Lama Waktu Rental (per hari): {$this->lama_rental}</p>";
                echo "<p>Jenis Motor: {$this->jenis_motor}</p>";
                echo "<p>Total: Rp. " . number_format($this->calculateTotal(), 2) . "</p>";
                echo "</div>";
            }
        }

        // Handle form submission
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $motor_rental = new MotorRental($_POST['nama_pelanggan'], $_POST['lama_rental'], $_POST['jenis_motor']);
            $motor_rental->displayOutput();
        }
        ?>
    </div>
</body>
</html>