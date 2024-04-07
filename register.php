<?php
include('server.php');

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $fullname = $_POST['fname'];
    $email = $_POST['email'];
    $number = $_POST['pnumber'];
    $date = $_POST['bdate'];
    $blood = $_POST['bgroup'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $address1 = $_POST['address1'];
    $Country = $_POST['country'];
    $city = $_POST['city'];
    $region = $_POST['region'];
    $postalcode = $_POST['postalcode'];

    if (!empty($email) && !empty($number) && !is_numeric($email)) {
        $query = "INSERT INTO form (fname, email, pnumber, bdate, bgroup, gender, address, address1, country, city, region, postalcode, others) VALUES ('$fullname', '$email', '$number', '$date', '$blood', '$gender', '$address', '$address1', '$Country', '$city', '$region', '$postalcode', '')";
        mysqli_query($con, $query);
        echo "<script type='text/javascript'>alert('Successfully registered');</script>";
    } else {
        echo "<script type='text/javascript'>alert('Please enter some valid information');</script>";
    }
}
?>
<!DOCTYPE html>
<!---Coding By CodingLab | www.codinglabweb.com--->
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <!--<title>Registration Form in HTML CSS</title>-->
    <!---Custom CSS File--->
 <style>
    /* Import Google font - Poppins */
@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap");
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
}
body {
  min-height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 20px;
  background: rgb(8, 7, 15);
}
.container {
  position: relative;
  max-width: 700px;
  width: 100%;
  background: #191313;
  padding: 25px;
  border-radius: 8px;
  box-shadow: 0 0 15px rgb(240, 237, 237);
}
.container header {
  font-size: 1.5rem;
  color: rgb(84,99,99);
color: linear-gradient(0deg, rgba(84,99,99,1) 0%, rgba(45,34,82,1) 98%);
  font-weight: 500;
  text-align: center;
}
.container .form {
  margin-top: 30px;
}
.form .input-box {
  width: 100%;
  margin-top: 20px;
}
.input-box label {
  color: #c4bcbc;
}
sup{
    color: rgba(156, 27, 27, 12.664);
}
.form :where(.input-box input, .select-box) {
  position: relative;
  height: 50px;
  width: 100%;
  outline: none;
  font-size: 1rem;
  color: #635d5d;
  margin-top: 8px;
  border: 1px solid #696363;
  border-radius: 6px;
  padding: 0 15px;
}
.input-box input:focus {
  box-shadow: 0 1px 0 rgba(0, 0, 0, 0.1);
}
.form .column {
  display: flex;
  column-gap: 15px;
}
.form .gender-box {
  margin-top: 20px;
}
.gender-box h3 {
  color: #969090; 
  font-size: 1rem;
  font-weight: 400;
  margin-bottom: 8px;
}
.form :where(.gender-option, .gender) {
  display: flex;
  align-items: center;
  column-gap: 50px;
  flex-wrap: wrap;
}
.form .gender {
  column-gap: 5px;
}
.gender input {
  accent-color: rgb(39, 18, 145);
}
.form :where(.gender input, .gender label) {
  cursor: pointer;
}
.gender label {
  color: #e7e1e185;
}

.address :where(input, .select-box) {
  margin-top: 15px;
}
.select-box select {
  height: 100%;
  width: 100%;
  outline: none;
  border: none;
  color: grey;
  font-size: 1rem;
}
.form button {
  height: 55px;
  width: 100%;
  color: white;
  font-size: 1rem;
  font-weight: 400;
  margin-top: 30px;
  border: 1px solid grey ;
 

  cursor: pointer;
  transition: all 0.2s ease;
  background: rgb(7,46,46);
background: linear-gradient(90deg, rgba(7,46,46,1) 35%, rgba(83,168,185,1) 100%);

}
.register{
color: white;
}
.form button:hover {
    background: rgb(7,46,46);
background: radial-gradient(circle, rgba(7,46,46,1) 35%, rgba(83,168,185,1) 100%);
}
/*Responsive*/
@media screen and (max-width: 500px) {
  .form .column {
    flex-wrap: wrap;
  }
  .form :where(.gender-option, .gender) {
    row-gap: 15px;
  }
}
 </style>
  </head>
  <body>
    <section class="container">
      <header>Registration Form</header>
      <form action="register.php"> <?php include ('error.php'); ?> 
      class="form">
        <div class="input-box">
          <label>Full Name <sup>*</sup></label>
          <input type="text"  placeholder="Enter full name" value="<?php echo $fullname; ?>"required />
        </div>

        <div class="input-box">
          <label>Email Address <sup>*</sup></label>
          <input type="text" placeholder="Enter email address"  value="<?php echo $email; ?>" required />
        </div>

        <div class="column">
          <div class="input-box">
            <label>Phone Number <sup>*</sup></label>
            <input type="number" placeholder="Enter phone number" value="<?php echo $number; ?>" required />
          </div>
          <div class="input-box">
            <label>Birth Date<sup>*</sup></label>
            <input type="date" placeholder="Enter birth date"  value="<?php echo $date; ?>" required />
          </div>
          <div class="input-box">
            <label>Blood Group<sup>*</sup></label>
            <input type="text" placeholder="Enter blood group" value="<?php echo $blood; ?>" required />
          </div>
        </div>
        <div class="gender-box">
          <h3>Gender <sup>*</sup></h3>
          <div class="gender-option">
            <div class="gender">
              <input type="radio" id="check-male" name="gender" value="<?php echo $male; ?>" checked />
              <label for="check-male">male</label>
            </div>
            <div class="gender">
              <input type="radio" id="check-female" value="<?php echo $female; ?>"name="gender" />
              <label for="check-female">Female</label>
            </div>
            <div class="gender">
              <input type="radio" id="check-other" name="gender"  value="<?php echo $other; ?>" />
              <label class="c" for="check-other">prefer not to say</label>
            </div>
          </div>
        </div>
        <div class="input-box address">
          <label>Address <sup>*</sup></label>
          <input type="text" placeholder="Enter street address"value="<?php echo $address; ?>" required />
          <input type="text" placeholder="Enter street address line 2" value="<?php echo $address1; ?>"required />
          <div class="column">
            <div class="select-box">
              <select value="<?php echo $Country; ?>">
                <option hidden>Country</option>
                <option>India</option>
                <option>Japan</option>
                <option>US</option>
                <option>Nepal</option>
              </select>
            </div>
           
            <input type="text" placeholder="Enter your city" value="<?php echo $city; ?>"required />
          </div>
          <div class="column">
            <input type="text" placeholder="Enter your region" value="<?php echo $region; ?>" required />
            <input type="number" placeholder="Enter postal code" value="<?php echo $postalcode; ?>"required />
          </div>
        </div>
       
       
       <button class="register"><a href="https://www.figma.com/file/C6PL3fHDJf7kPF5dXfZSiX/him.restaurant?node-id=0%3A1&mode=dev" class="register=link">Submit</a></button>
       
    <button> <a href="index.html" >Back</a></button>
      </form>
    </section>
  </body>
</html>
