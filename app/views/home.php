<?php partials('header.php'); ?>
<h2>Upload new Image</h2>

<?php echo flash('file') ?>

<?php if($user->image): ?>
  <div class="card card-user" style="width: 18rem;">
    <div class="card-body">
      <h5 class="card-title"><?php echo $user->firstName; ?> <?php echo $user->lastName; ?></h5>
      <h6 class="card-subtitle mb-2 text-body-secondary">
      <img src="<?php echo $user->image; ?>" class="img-thumbnail" alt="avatar">
      </h6>
      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    </div>
  </div>
<?php endif ?>

<form action="/upload" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <input type="file" name="file" class="form-control">
  </div>

  <div class="form-group">
  <input type="text" name="firstName" placeholder="Your firstName" class="form-control" value="Alexandre">
    <?php echo flash('firstName') ?>
  </div>

  <div class="form-group">
  <input type="text" name="lastName" placeholder="Your lastName" class="form-control" value="Cardoso">
    <?php echo flash('lastName') ?>
  </div>

  <div class="form-group">
  <input type="text" name="email" placeholder="Your email" class="form-control" value="xandecar@hotmail.com">
    <?php echo flash('email') ?>
  </div>

  <div class="form-group">
  <input type="text" name="password" placeholder="Your password" class="form-control" value="12345">
    <?php echo flash('password') ?>
  </div>
  <button type="submit">Upload</button>
</form>
<?php partials('footer.php'); ?>