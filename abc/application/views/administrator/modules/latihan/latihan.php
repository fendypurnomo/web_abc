<div class="row">
	<div class="col-sm">
		<div id="latihan"></div>
		<p id="demo"></p>
		<!--JS Events-->
		<div onmouseover="this.style.backgroundColor='red'">On Mouse Over myDIV.</div>
		<button onclick="alert('Hello')">Click me. (Alert)</button>
	</div>
</div>

<script>

	//JS Variables
	var z = document.getElementById("latihan");
	var carName = "Volvo";

	a = 10;
	b = 5;
	c = a + b;

	//JS Function
	function myFunction() {
		return "Asu";
	}

	//JS Object
	var person = {
		firstName: "John",
		lastName: "Doe"
	}
	var persons = person.firstName;

	//JS String
	var txt = "Hello World!";
	var hello = txt.length;

	//JS Arrays
	var cars = ["Volvo","Jeep","Mercedes"];
	var car = cars.length;

	var fruits = ["Banana","Orange","Apple","Kiwi"];
	fruits.pop();
	fruits.push("Kiwi");
	fruits.splice(1,2);
	fruits.sort();

	var girls = ["Cecilie","Lone"];
	var boys = ["Emil","Tobias","Linus"];
	var children = girls.concat(boys);

	//JS Dates
	var d = new Date();
	year = d.getFullYear();

	//JS Math
	var r = Math.random();
	var x = Math.max(10,20);

	//JS Comparisons
	var age = 10;
	var voteable = (age < 18) ? "Too young" : "Old enough";

	var i;
	for (i=0; i<10; i++) {
		console.log(i);
	}

	var fruits = ["Apple","Banana","Orange"];
	for (x in fruits) {
		console.log(x);
	}

	document.getElementsByTagName("p")[0].innerHTML = "Hello";

	z.innerHTML = myFunction();
</script>
