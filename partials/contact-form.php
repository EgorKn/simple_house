<form action="partials/process_contact.php" method="POST" class="tm-contact-form">
    <div class="form-group">
        <input type="text" name="name" class="form-control" placeholder="Name" required="">
    </div>

    <div class="form-group">
        <input type="email" name="email" class="form-control" placeholder="Email" required="">
    </div>

    <div class="form-group">
        <textarea rows="5" name="message" class="form-control" placeholder="Message" required=""></textarea>
    </div>

    <div class="form-group tm-d-flex">
        <button type="submit" class="tm-btn tm-btn-success tm-btn-right">
            Send
        </button>
    </div>
</form>
