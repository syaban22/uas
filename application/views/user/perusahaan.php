

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>

          <div class="row">
          	<div class="col-lg">
          		<table class="table table-hover">
				  <thead>
				    <tr>
				      <th scope="col">No</th>
				      <th scope="col">Perusahaan</th>
				    </tr>
				  </thead>
				  <tbody>
				  	<?php $no = 1; ?>
				  	<?php foreach($perusahaan as $p) : ?>
				    <tr>
				      <th scope="row"><?= $no; ?></th>
				      <td><?= $p['perusahaan']; ?></td>
				    </tr>
				    <?php $no++; ?>
					<?php endforeach; ?>
				  </tbody>
				</table>
          	</div>
          </div>


        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
