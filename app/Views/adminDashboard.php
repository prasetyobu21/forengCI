<body>
  <div class="container">
    <div class=" row">
      <div class="col">
        <h1>Admin Dashboard</h1>
        <h3 class="text-center text-white pt-5">Login form</h3>
        <label for="exampleInputEmail1"></label>
        <input class="form-control" type="text" placeholder="Default input" />
        <button type="submit" onClick="window.location.href='/auditorium'" class="btn btn-primary">Submit</button>
        <div class="embed-responsive embed-responsive-16by9" style="margin-top: 30px; margin-left: -13px">
          Youtube
          <iframe id="sponsorVideo" src="https://www.youtube.com/embed/7LeOx-XLWEw?autoplay=1;controls=0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
      </div>
      <div class="col">
        <h3 class="mt-2">List Sponsor</h3>
        <?php if (session()->getFlashdata('pesan')) : ?>
          <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('pesan'); ?>
          </div>
        <?php endif; ?>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nama</th>
              <th scope="col">No.Telepon</th>
              <th scope="col">Sponsor Logo</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?= $i = 1; ?>
            <?php foreach ($sponsorData as $s) : ?>
              <tr>
                <th scope="row"><?= $i++; ?></th>
                <td><?= $s['name']; ?></td>
                <td><?= $s['phoneNumber']; ?></td>
                <td><img class="logo img-thumbnail" src="/assets/photos/sponsor/logo/<?= $s['sponsor_logo']; ?>">
                </td>
                <td>
                  <a href="/admin/adminDashboard/<?= $s['description']; ?>" class="btn btn-primary">Detail</a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
        <button type="submit" onClick="window.location.href='/Admin/input'" class="btn btn-primary">Add New</button>
      </div>
    </div>
  </div>
</body>