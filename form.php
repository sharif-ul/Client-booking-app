
			
		<form action="process.php" method="POST">
		
			<input type="hidden" name="formID" value="bookingform">
			<input type="hidden" name="redirect_to" value="">
			
			<fieldset>
				<legend>Personal details: </legend>
				<label for="name">Username: </label> <input type="text" name="username" id="name" required autofocus placeholder="Your username" pattern="[a-zA-Z]{3,}" title="Please enter in more than three letters">
				<label for="email">Email: </label> <input type="text" name="email" id="email" required placeholder="Your Email" pattern="[a-zA-Z]{3,}@[a-zA-Z]{3,}[.]{1}[a-zA-Z]{2,}" title="Please enter in a valid e-mail address">
				<label for="phone">Phone: </label> <input type="tel" name="phone" id="phone" required placeholder="Please enter in your phone number" pattern="[0-9]{4} [0-9]{3} [0-9]{3}" title="Please enter in a phone number in this format: #### ### ###">
				<select name="country" required>
					<option value="">Select one</option>
					<option value="AUS">Australia(AUS)</option>
					<option value="BAN">Bangladesh(BGD)</option>
					<option value="UK">United Kingdom(UK</option>
					<option value="US">United States(US)</option>
				</select>
			</fieldset>

			<br>

			<fieldset>
				<legend>Booking details: </legend>
				<label for="date">Booking date: </label> <input id="date" type="date" name="date" min="2016-05-17">
				<label for="numberOfGuests">Number of Guests: </label> <input id="numberOfGuests" type="number" name="numberOfGuests" min="1" max="6">
				<p>Do you require meals?</p>
				<label for="yesMeals">Yes: </label> <input id="yesMeals" type="radio" name="meals" value="yesMeals">
				<label for="noMeals">No: </label> <input id="noMeals" type="radio" name="meals" value="noMeals">
				<br>
				<label for="balcony">Do you require a balcony?</label> <input id="balcony" type="checkbox" name="balcony" value="yes" checked>
				<br>
				<br>
				<input type="submit" value="Submit">
			</fieldset>

		</form>

		<br>

			<fieldset>
				<legend>Manage bookings</legend>
				<div>
					<h3>Booking overview: </h3>
					<a href="login-paginator.php" target="_blank">
						<input type="submit" name="find" value="All bookings">
					</a>
				</div>
				<br>
				<div>
					<h3>Update a booking : </h3>
					<a href="login-edit.php" target="_blank">
						<input type="submit" name="edit" value="Update booking">
					</a>
				</div>
				<br>

				<h3>Search name</h3>
    				<form action="search.php" method="get">
        				<label for="search-field">Customer name: </label><input type="search" name="s" id="search-field" required autofocus placeholder="Enter the name">
          				<input type="submit" value="Search"> 
          			</form>

        			<br>

        		<h2>Delete booking!!!</h2>
					<form action="delete_data.php" method="post">
						ID TO DELETE:&nbsp;
            			<input type="text" name="id" required>
            			<input type="submit" name="delete" value="Clear Data">
        			</form>

        		
			</fieldset>

			
