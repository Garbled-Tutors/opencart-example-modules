<?php echo $header; ?>
<div id="content">
  <div class="breadcrumb">
    <?php foreach ($breadcrumbs as $breadcrumb) { ?>
    <?php echo $breadcrumb['separator']; ?><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a>
    <?php } ?>
  </div>
  <?php if ($error_warning) { ?>
  <div class="warning"><?php echo $error_warning; ?></div>
  <?php } ?>
  <div class="box">
    <div class="heading">
      <h1><img src="view/image/module.png" alt="" />Names</h1>
    </div>
    <div class="content">
      <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form">
        <table id="module" class="list">
          <thead>
            <tr>
							<td class="left">Name</td>
							<td class="left">Email</td>
							<td class="left"></td>
            </tr>
          </thead>
					<?php foreach ($names->rows as $name) { ?>
					<?php if ( ($modules['action'] != 'edit') or ($modules['var'] != $name['id'] ) ) { ?>
					<tr>
						<td><?php echo $name['name'] ?></td>
						<td><?php echo $name['email'] ?></td>
						<td><a onclick="document.getElementById('action_var').value=<?php echo $name['id']; ?>;document.getElementById('action_field').value='edit';$('#form').submit();" class="button">Edit</a>
						<a onclick="document.getElementById('action_var').value=<?php echo $name['id']; ?>;document.getElementById('action_field').value='delete';$('#form').submit();" class="button">Delete</a></td>
					</tr>
					<?php } else { ?>
						<?php $old_email = $name['email']; $old_name = $name['name']; ?>
					<?php } } ?>
					<tfoot>
						<td>
						<?php if ($modules['action'] != 'edit') { ?>
							<input type="hidden" name="names_module[action]" id='action_field' value="add" />
							<input type="hidden" name="names_module[var]" id='action_var' value="" />
							<input type="text" name="names_module[Name]" />
						</td>
						<td>
							<input type="text" name="names_module[Email]" />
						</td>
						<td>
							<a onclick="$('#form').submit();" class="button">Add Name</a>
						<?php } else { ?>
							<input type="hidden" name="names_module[action]" id='action_field' value="update" />
							<input type="hidden" name="names_module[var]" id='action_var' value="<?php echo $modules['var']; ?>" />
							<input type="text" name="names_module[Name]" value="<?php echo $old_name; ?>"/>
						</td>
						<td>
						<input type="text" name="names_module[Email]" value="<?php echo $old_email; ?>"/>
						</td>
						<td>
							<a onclick="$('#form').submit();" class="button">Update Name</a>
						<a onclick="document.getElementById('action_var').value='';document.getElementById('action_field').value='cancel';$('#form').submit();" class="button">Cancel</a>
						<?php } ?>
						</td>
					</tfoot>
        </table>
      </form>
    </div>
  </div>
</div>
<?php echo $footer; ?>
