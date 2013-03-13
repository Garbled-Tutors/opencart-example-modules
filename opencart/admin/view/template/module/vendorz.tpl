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
      <h1><img src="view/image/module.png" alt="" />Vendors</h1>
    </div>
    <div class="content">
      <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form">
        <table id="module" class="list">
          <thead>
            <tr>
							<td class="left">Vendor Name</td>
							<td class="left">Vendor Email</td>
							<td class="left"></td>
            </tr>
          </thead>
					<tfoot>
						<td>
							<input type="hidden" name="action" value="" />
							<input type="hidden" name="var" value="" />
							<input type="text" name="vendorz_module[Name]" />
						</td>
						<td>
							<input type="text" name="vendorz_module[Email]" />
						</td>
						<td>
							<a onclick="$('#form').submit();" class="button">Add Vendor</a>
						</td>
					</tfoot>
        </table>
      </form>
    </div>
  </div>
</div>
<?php echo $footer; ?>
