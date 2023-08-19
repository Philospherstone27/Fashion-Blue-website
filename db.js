const mysql = require('mysql');

const connection = mysql.createConnection({
  host: 'localhost',
  user: 'root',
  password: '',
  database: 'myDB'
});

// connection.connect((err) => {
//   if (err) {
//     console.error('Error connecting to database:', err);
//     return;
//   }
//   console.log('Connected to database!');
// });
let email = "admin1@gmail.com";
let passwords = "singh2003";


  connection.query("SELECT customerid FROM customer WHERE email = ?", [email], (err, result, rows) => {
    if (err) {
      console.error("Error selecting customer:", err);
      return;
    }
    if (result.length === 0) {
      console.error("No customer found with email:", email);
      return;
    }
  
    const customerId = result[0].customerid;
  
    connection.query("SELECT password FROM customer WHERE customerid = ?", [customerId], (err, results, row) => {
      if (err) {
        console.error("Error selecting password:", err);
        return;
      }
      if (results[0].password === passwords) {
        console.log("login successful");
      }
      else {
        console.error("password incorrect");
      }
      
  connection.end();
    });
  });






