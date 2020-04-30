// Initialize Firebase (ADD YOUR OWN DATA)
var config = {
  apiKey: "AIzaSyCKpfdZfx9cnIi00C2aUB2O340y0ZahlTA",
  authDomain: "contactform-6533e.firebaseapp.com",
  databaseURL: "https://contactform-6533e.firebaseio.com",
  projectId: "contactform-6533e",
  storageBucket: "contactform-6533e.appspot.com",
  messagingSenderId: "355724378674"
};
firebase.initializeApp(config);

// Reference messages collection
var messagesRef = firebase.database().ref('messages');

//encryption
var text , keyy = 12;
function encrypt(text, keyy) {
	keyy1 = (26 - keyy) % 26;
	var textElem = document.getElementById("text");
	var result = "";
	for (var i = 0; i < text.length; i++) {
		var c = text.charCodeAt(i);
		if      (65 <= c && c <=  90) result += String.fromCharCode((c - 65 + keyy1) % 26 + 65);  // Uppercase
		else if (97 <= c && c <= 122) result += String.fromCharCode((c - 97 + keyy1) % 26 + 97);  // Lowercase
		else                          result += text.charAt(i);  // Copy
	}
	return result;
}

//decryption
function decrypt(text, keyy) {
	keyy2=keyy;
	var result = "";
	for (var i = 0; i < text.length; i++) {
		var c = text.charCodeAt(i);
		if      (65 <= c && c <=  90) result += String.fromCharCode((c - 65 + keyy2) % 26 + 65);  // Uppercase
		else if (97 <= c && c <= 122) result += String.fromCharCode((c - 97 + keyy2) % 26 + 97);  // Lowercase
		else                          result += text.charAt(i);  // Copy
	}
	return result;
}


messagesRef.on('value', gotData, errData);
var str = `
  <table border="1" style="max-width:auto;">
    <tr>
      <th>Name</th>
      <th>Class </th>
      <th>Email </th>
      <th>Phone </th>
      <th>Message</th>
    </tr>`;
function gotData(data){
  var messages = data.val();
  var keys = Object.keys(messages);
  // console.log(keys); 
  
  let list = document.getElementById('list');
  list.innerHTML = "";
  for (var i=0; i< keys.length; i++){
    var k= keys[i];
    var Namee = decrypt(messages[k].name,keyy);
    var Companyy = decrypt(messages[k].company,keyy);
    var Emaill = decrypt(messages[k].email,keyy);
    var Phonee = messages[k].phone;
    var Messagee = decrypt(messages[k].message,keyy);
    //console.log(Namee, Companyy, Emaill, Phonee, Messagee);

    str +=
      `
      <tr style="max-width:auto;">
        <td id='name'>${Namee}</td>
        <td id='company'>${Companyy}</td>
        <td id='email'>${Emaill}</td>
        <td id='phone'>${Phonee}</td>
        <td id='msg'>${Messagee}</td>
      </tr>
      `;    
  }
  str +='</table>';
  document.getElementById('list').innerHTML = str;
}

function errData(data){
  console.log('Error!');
  console.log(err);
 
}

// Listen for form submit
document.getElementById('contactForm').addEventListener('submit', submitForm);

// Submit form
function submitForm(e){
  e.preventDefault();

  // Get values
  
  var name = encrypt(getInputVal('name'),keyy) ;
  var company = encrypt(getInputVal('company'),keyy);
  var email = encrypt(getInputVal('email'),keyy);
  var phone = getInputVal('phone');
  var message = encrypt(getInputVal('message'),keyy);

  // Save message
  saveMessage(name, company, email, phone, message);

  // Show alert
  document.querySelector('.alert').style.display = 'block';

  // Hide alert after 3 seconds
  setTimeout(function(){
    document.querySelector('.alert').style.display = 'none';
  },3000);

  // Clear form
  document.getElementById('contactForm').reset();
}

// Function to get get form values
function getInputVal(id){
  return document.getElementById(id).value;
}


// Save message to firebase
function saveMessage(name, company, email, phone, message){
  var newMessageRef = messagesRef.push();
  newMessageRef.set({
    name: name,
    company:company,
    email:email,
    phone:phone,
    message:message
  });
}




