<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <style>
                body {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
        nav {
            color: #ffffff;
            background: black;
            max-width: 100%;
            min-height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .options {
            margin-top: 100px;
            margin-bottom: 100px;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
        .options button {
            background: rgb(66, 197, 249);
            border: none;
            color: #ffffff;
            width: 200px;
            height: 200px;
            border-radius: 10px;
            font-size: 20px;
            font-weight: bold;
            cursor: pointer;
        }
        .options button:hover {
            opacity: 0.8;
        }
        .option-1 {
            margin: 0px 0px 40px 0px;
        }
        .options a {
            margin-right: 20px;
        }
        .balance {
            display: flex;
            align-items: center;
            flex-direction: column;
            margin-top: 80px;
        }
        .balance h4 {
            font-size: 30px;
            margin-bottom: -10px;
        }
        .balance p {
            font-size: 20px;
        }
        .balance-btn {
            display: flex;
            justify-content: center;
            text-decoration: none;
        }
        .balance-btn button {
            background: rgb(66, 197, 249);
            border: none;
            color: white;
            border-radius: 10px;
            width: 200px;
            height: 30px;
            font-weight: bold;
            font-size: 18px;
        }
        .problem-form {
            margin: 40px 60px 40px 60px;
            display: flex;
            justify-content: center;
            flex-direction: column;
        }
        .problem-form button {
            background: rgb(66, 197, 249);
            color: #ffffff;
            border: none;
            font-weight: bold;
            font-size: 18px;
            height: 35px;
            border-radius: 10px;
        }
        .problem-form input,
        select {
            height: 30px;
        }
        .report-table {
            margin-top: 40px;
            width: 100%;
            border-collapse: collapse;
        }
        .report-table td,
        th {
            text-align: left;
            padding: 8px;
        }
        .report-table th {
            background: rgb(66, 197, 249);
        }
        .report-table tr:nth-child(odd) {
            background: #dddddd;
        }
        .report-btn button {
            float: right;
            background: rgb(66, 197, 249);
            color: #ffffff;
            font-weight: bold;
            font-size: 18px;
            width: 200px;
            height: 30px;
            border: none;
            border-radius: 10px;
            margin: 0px 5px 40px 0px;
        }

    </style>
    <title>Payment</title>
  </head>
  <body>
    <nav><h2>Madaraka Apartments</h2></nav>
    <form action={{route('payment.store')}} class="problem-form" method="POST">
      @csrf
      @method('post')
      <label for="fname">First Name</label><br />
      <input type="text" name="fname" id="fname" placeholder="e.g Leo" /><br />
      <label for="lname">Last Name</label><br />
      <input
        type="text"
        name="lname"
        id="lname"
        placeholder="e.g Messi"
      /><br />
      <label for="phoneNo">Phone Number</label><br />
      <input
        type="tel"
        name="phoneNo"
        id="phoneNo"
        placeholder="e.g 0722222222"
      /><br />
      <label for="amount">Amount</label><br />
      <input
        type="number"
        name="amount"
        id="amount"
        placeholder="e.g 20000"
      /><br />
      <label for="houseNo">House No</label><br />
      <input
        type="text"
        name="houseNo"
        id="houseNo"
        placeholder="e.g 1B"
      /><br />
      <label for="option">Payment Option</label><br />
      <input
        type="text"
        name="option"
        id="option"
        placeholder="Mpesa: Buy Goods and Services"
        disabled
      /><br />
      <button type="submit">Submit</button>
    </form>
  </body>
</html>
