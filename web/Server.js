const express = require('express')
const app = express()
require('dotenv').config();

var bodyParser = require('body-parser');
app.use(bodyParser.json()); // support json encoded bodies
app.use(bodyParser.urlencoded({ extended: true })); // support encoded bodies

const bcrypt = require('bcrypt')

const connectionString = process.env.DATABASE_URL
const { Pool } = require('pg')

const pool = new Pool({connectionString: connectionString});
const path = require('path')
const PORT = process.env.PORT || 5000

const session = require('express-session')

app.use(express.static(path.join(__dirname, 'public')))
app.use(session({
  resave: false,
  saveUninitialized: true,
  secret: "It's a secret?"
}))
app.set('views', path.join(__dirname, 'views'))
app.set('view engine', 'ejs')

// The root
app.get('/', (req, res) => {
  res.render(
    'pages/Calendar Login',
    {
      userID: req.session.userID,
      username: req.session.username,
      query: req.query
    })
})

//Login route
app.post('/login', (req, res)=>{
	//Get the username & password
	let username = req.body.username
	let password = req.body.password

	//Verify the username & password
	pool.query(
		'SELECT * FROM users WHERE username ILIKE $1', [username],  (err, qres)=> { 
																							if (err)
																							{
																								throw(err)
																							}
																							
																							//Check to see if that username exists
																							if (qres.rowCount == 0)
																							{
																								res.redirect('/?err=badusername')
																							}
																							else
																							{
																								//Check to see if the password is valid
																								console.log(password)
																								console.log(qres.rows[0].drowssap)
																								bcrypt.compare(password, qres.rows[0].drowssap).then((valid)=>{
																									if (valid)
																									{
																										//Complete the login
																										req.session.userID = qres.rows[0].userid
																										req.session.username = qres.rows.username
																										res.render('pages/Calendar Display')
																									}
																									else
																									{
																										res.redirect('/?err=badpassword')
																									}
																								})
																							}
																						})	
})

//Account route
app.get('/account', (req, res)=>{
	pool.query('SELECT regionid, regionname FROM Regions',   (err, qres)=> {
																					if (err)
																					{
																						throw(err)
																					}

																					res.render('pages/Calendar Account', {data: JSON.stringify(qres.rows)})
																				})
})

app.listen(PORT, () => console.log(`Listening on ${ PORT }!!!`))