    <section id="booking" class="resume">
      <div class="container">
        <h3 class="resume-title1"> Booking</h3>
<p style="margin:2em;font-size:1.8em;">
        <b style="color:red;font-weight:bold;">please note</b>
        &nbsp;&nbsp;we're now operate 4 days of week "Monday","Wednesday","Friday" and "Saturday"
      </p>
        <?php
        $tour_id = 1;
        ?>
        <div style="margin-top:2em;margin-bottom:2em;">

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

                <button class="btn btn-primary" type="submit">Add To Cart</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </section>
