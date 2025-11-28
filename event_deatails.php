<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Event Details</title>
<style>
/* Popup background */
.popup-bg {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,0.5);
}

/* Popup form */
.popup-box {
    background: white;
    width: 350px;
    margin: 120px auto;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 15px black;
}
.close-btn {
    float: right;
    cursor: pointer;
    font-size: 18px;
    color: red;
}
.input-box {
    width: 100%;
    padding: 10px;
    margin: 8px 0;
}
.submit-btn {
    width: 100%;
    padding: 10px;
    background: black;
    color: white;
    border: none;
    cursor: pointer;
}
</style>
</head>

<body>

<h2>Music Fest Event</h2>
<p>Click below to purchase a ticket.</p>

<button id="purchaseBtn">Purchase Ticket</button>


<!-- POPUP -->
<div class="popup-bg" id="popupForm">
    <div class="popup-box">
        <span class="close-btn" id="closePopup">✖</span>

        <h3>Purchase Ticket</h3>
        <form action="save-ticket.php" method="POST">
            <input type="text" name="name" placeholder="Full Name" class="input-box" required>
            <input type="text" name="phone" placeholder="Phone Number" class="input-box" required>
            <input type="email" name="email" placeholder="Email" class="input-box" required>
            <input type="text" name="city" placeholder="City" class="input-box" required>

            <button type="submit" class="submit-btn">Submit</button>
        </form>
    </div>
</div>


<script>
// Open popup
document.getElementById("purchaseBtn").onclick = function() {
    document.getElementById("popupForm").style.display = "block";
};

// Close popup
document.getElementById("closePopup").onclick = function() {
    document.getElementById("popupForm").style.display = "none";
};
</script>

</body>
</html>
