<div class="container-fluid px-4">
    <h2 class="mt-4">Akun Pengguna Admin Kab/Kota</h2>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"></li>
    </ol>
    <div class="card mb-4">
        <div class="card-body">
        	<table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Full Name</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Group</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
				<?php $no=1; foreach ($users as $user):?>
					<tr>
						<td><?php echo $no++; ?></td>
			            <td><?php echo htmlspecialchars($user->first_name,ENT_QUOTES,'UTF-8').' '.htmlspecialchars($user->last_name,ENT_QUOTES,'UTF-8');?></td>
			            <td><?php echo htmlspecialchars($user->username,ENT_QUOTES,'UTF-8');?></td>
			            <td><?php echo htmlspecialchars($user->email,ENT_QUOTES,'UTF-8');?></td>
						<td>
							<?php foreach ($user->groups as $group):?>
								<?php echo anchor("auth/edit_group/".$group->id, htmlspecialchars($group->name,ENT_QUOTES,'UTF-8')) ;?><br />
			                <?php endforeach?>
						</td>
						<td><?php echo ($user->active) ? anchor("auth/deactivate/".$user->id, 'Deactivate',array('class'=>'btn btn-sm btn-danger')) : anchor("auth/activate/". $user->id, 'Activate' ,array('class'=>'btn btn-sm btn-success'));?></td>
						<td><?php echo anchor("auth/edit_user/".$user->id, 'Edit',array('class'=>'btn btn-sm btn-primary')) ;?></td>
					</tr>
				<?php endforeach;?>
			</tbody>
			</table>

<p><?php echo anchor('auth/create_user', 'Create User',array('class'=>'btn btn-xs btn-primary'))?> </p>
		<a href="">
		</div>
	</div>
</div>