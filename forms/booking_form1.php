    <section id="booking" class="resume" style="margin-top:2em;">
      <div class="container">
        <h3 class="resume-title1"> Booking</h3>
        <div class="alert alert-warning"> 

<p style="font-size:1.4em;">
        <b style="color:red;font-weight:bold;">please note</b>
        &nbsp;&nbsp;we're now operate 4 days of week "Monday","Wednesday","Friday" and "Saturday"
      </p>
        </div>

        <form action="/cart.php" method="post" class="form-inline">
          <input name="tour_id" value="<?php echo $tour_id; ?>" type="hidden">
          <div class="form-group">
            <label>Booking Date : </label>
            <input type="date" class="form-control" name="bookingdate" id="bookingdate" placeholder="please select the date" required />
          </div>
          <div class="form-group">
            <label> Adult : </label>
            <select name="adult" class="form-control">
              <?php for ($i = 1; $i <= 10; $i++) { ?>
                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group">
            <label> Child (6 -12 years) : </label>
            <select name="child" class="form-control">
              <?php for ($i = 0; $i <= 10; $i++) { ?>
                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group" style="margin-top:1em;">
            <div class="text-end">

              <button class="btn btn-outline-primary " type="submit">Add To Cart</button>
            </div>
          </div>
        </form>
      </div>
    </section>
