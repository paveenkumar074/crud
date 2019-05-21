<style type="text/css">
	.mb-0{
		margin-bottom: 0px;
	}

	.avatar-upload {
		position: relative;
		max-width: 205px;
	}
	.avatar-upload .avatar-edit {
		position: absolute;
		right: 12px;
		z-index: 1;
		top: 10px;
	}
	.avatar-upload .avatar-edit input {
		display: none;
	}
	.avatar-upload .avatar-edit input + label {
		display: inline-block;
		width: 34px;
		height: 34px;
		margin-bottom: 0;
		border-radius: 100%;
		background: #FFFFFF;
		border: 1px solid transparent;
		box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
		cursor: pointer;
		font-weight: normal;
		transition: all 0.2s ease-in-out;
	}
	.avatar-upload .avatar-edit input + label:hover {
		background: #f1f1f1;
		border-color: #d6d6d6;
	}
	.avatar-upload .avatar-edit input + label:after {
		content: "\f040";
		font-family: 'FontAwesome';
		color: #757575;
		position: absolute;
		top: 10px;
		left: 0;
		right: 0;
		text-align: center;
		margin: auto;
	}
	.avatar-upload .avatar-preview {
		width: 192px;
		height: 192px;
		position: relative;
		border-radius: 100%;
		border: 6px solid #F8F8F8;
		box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
	}
	.avatar-upload .avatar-preview > div {
		width: 100%;
		height: 100%;
		border-radius: 100%;
		background-size: cover;
		background-repeat: no-repeat;
		background-position: center;
	}

	.mr-15p{
		margin-right: 15px;
		}.ml-45{
			margin-left: 45px;
		}

		#datepicker > span:hover{cursor: pointer;}
	</style>
	<link href="<?php echo base_url(); ?>assets/bootstrap-datepicker/css/bootstrap-datepicker3.min.css">


	<div class="container">
		<div class="row">
			<div class="table-wrapper">
				<div class="table-title">
					<div class="row">
						<div class="panel panel-heading text-center mb-0"><h4><b>Add User</b></h4></div>

					</div>
				</div>

				<div class="row">
					<?php echo form_open('muser/edit/'.$muser['UserUID'],array("class"=>"form-horizontal","enctype"=>"multipart/form-data")); ?> 
					<div class="col-sm-6">
						<h4 class="row page-header">Personal Info</h4>

						<div class="col-sm-12 form-group">
							<label for="FirstName" class="control-label">FirstName <span class="text-danger">*</span></label>

							<input type="text" name="FirstName" value="<?php echo ($this->input->post('FirstName') ? $this->input->post('FirstName') : $muser['FirstName']); ?>" class="form-control" id="FirstName" required />
							<span class="text-danger"><?php echo form_error('FirstName');?></span>
						</div>

						<div class="col-sm-12 form-group">
							<label for="LastName" class="control-label">LastName <span class="text-danger">*</span></label>

							<input type="text" name="LastName" value="<?php echo ($this->input->post('LastName') ? $this->input->post('LastName') : $muser['LastName']); ?>" class="form-control" id="LastName" required />
							<span class="text-danger"><?php echo form_error('LastName');?></span>
						</div>


						<div class="row col-sm-12">
							<div class="col-sm-6 form-group">
								<label for="CountryUID" class="control-label">Birthday</label>
								<div class="input-group date" id="datepicker">
									<input type="text" class="form-control" name="Birthday" value="<?php echo ($this->input->post('Birthday') ? $this->input->post('Birthday') : $muser['Birthday']); ?>"/>
									<span class="input-group-addon">
										<span class="glyphicon glyphicon-time"></span>
									</span>
								</div>
							</div>
							<div class="row col-sm-6 ml-45">
								<label for="CountryUID" class="control-label">Country <span class="text-danger">*</span></label>

								<select name="CountryUID" class="form-control" required>
									<option value="">Select</option>
									<?php 
									foreach($all_mcountries as $mcountry)
									{
										$selected = ($mcountry['CountryUID'] == $muser['CountryUID']) ? ' selected="selected"' : "";

										echo '<option value="'.$mcountry['CountryUID'].'" '.$selected.'>'.$mcountry['CountryName'].'</option>';
									} 
									?>
								</select>
								<span class="text-danger"><?php echo form_error('CountryUID');?></span>

							</div>



						</div>

						<div class="row col-sm-12">
							<div class=" col-sm-6 form-group">
								<label for="Height" class="control-label">Height</label>

								<input type="text" name="Height" value="<?php echo ($this->input->post('Height') ? $this->input->post('Height') : $muser['Height']); ?>" class="form-control" id="Height" />
								<span class="text-danger"><?php echo form_error('Height');?></span>
							</div>
							<div class="row col-sm-6 ml-45">
								<label for="Weight" class="control-label">Weight</label>

								<input type="text" name="Weight"  value="<?php echo ($this->input->post('Weight') ? $this->input->post('Weight') : $muser['Weight']); ?>" class="form-control" id="Weight" />
								<span class="text-danger"><?php echo form_error('Weight');?></span>
							</div>
						</div>
						<h4 class="row page-header">Current Team</h4>
						<div class="row">

							<div class="col-sm-5">
								<div class="form-grousp">
									<label for="TeamUID" class="control-label">Name</label>

									<select name="TeamUID" class="form-control">
										<option value="">select mteam</option>
										<?php 
										foreach($all_mteams as $mteam)
										{
											$selected = ($mteam['TeamUID'] == $muser['TeamUID']) ? ' selected="selected"' : "";

											echo '<option value="'.$mteam['TeamUID'].'" '.$selected.'>'.$mteam['TeamName'].'</option>';
										} 
										?>
									</select>
								</div>
							</div>


							<div class="col-sm-4">


								<div class="form-groups">
									<label for="Position" class="control-label">Position</label>

									<select name="Position" class="form-control">
										<option value="">select</option>
										<?php 
										$Position_values = array(
											'Backward'=>'Backward',
											'Forward'=>'Forward',
										);

										foreach($Position_values as $value => $display_text)
										{
											$selected = ($value == $muser['Position']) ? ' selected="selected"' : "";

											echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
										} 
										?>
									</select>
								</div>
							</div>

							<div class="col-sm-2">
								<div class="form-group">
									<label for="Number" class="control-label">Number</label>

									<input type="text" name="Number" value="<?php echo ($this->input->post('Number') ? $this->input->post('Number') : $muser['Number']); ?>" class="form-control" id="Number" />
									<span class="text-danger"><?php echo form_error('Number');?></span>
								</div>
							</div>
							<div class="col-sm-1"></div>
						</div>

						<h4 class="row page-header">Misc</h4>

						<div class="row">
							<div class="form-group col-sm-6">
								<label for="CollegeUID" class="control-label">Mcollege</label>

								<select name="CollegeUID" class="form-control">
									<option value="">select mcollege</option>
									<?php 
									foreach($all_mcolleges as $mcollege)
									{
										$selected = ($mcollege['CollegeUID'] == $muser['CollegeUID']) ? ' selected="selected"' : "";

										echo '<option value="'.$mcollege['CollegeUID'].'" '.$selected.'>'.$mcollege['CollegeName'].'</option>';
									} 
									?>
								</select>
							</div>

							<div class="col-sm-6">
								<label for="NBAdebut" class="control-label">NBAdebut <span class="text-danger">*</span></label>

								<input type="text" name="NBAdebut" value="<?php echo ($this->input->post('NBAdebut') ? $this->input->post('NBAdebut') : $muser['NBAdebut']); ?>" class="form-control" id="NBAdebut" required />
								<span class="text-danger"><?php echo form_error('NBAdebut');?></span>
							</div>

						</div>

						<p><span class="text-danger">*</span> - Required field</p>
						


						<div class="form-group">
							<div class="col-sm-offset-4 col-sm-8">
								<button type="submit" class="btn btn-success">Update</button>
								<a href="<?php echo site_url('muser'); ?>" class="btn btn-primary">Cancel</a> 

							</div>


						</div>
					</div>
					<div class="col-sm-6">
						<h4 class="page-header">Photo</h4>
						<div class="avatar-upload">
							<div class="avatar-edit">
								<input type='file' id="imageUpload" name="imageUpload" accept=".png, .jpg, .jpeg" />
								<label for="imageUpload"></label>
							</div>
							<div class="avatar-preview">
								<?php if(!empty($muser['Avatar']) && file_exists(FCPATH.'uploads/avatar/'.$muser['Avatar'])){ ?>
									<div id="imagePreview" style="background-image: url('<?php echo base_url('uploads/avatar/'.$muser["Avatar"]); ?>');">
									</div>
								<?php } else { ?>
									<div id="imagePreview" style="background-image: url(http://www.gravatar.com/avatar/?d=mm);">
									</div>
								<?php } ?>	
							</div>
						</div>
					</div>
					<?php echo form_close(); ?>


				</div>

			</div>

		</div>
	</div>
	<script src="<?php echo base_url(); ?>assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>

	<script type="text/javascript">
		function readURL(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();
				reader.onload = function(e) {
					$('#imagePreview').css('background-image', 'url('+e.target.result +')');
					$('#imagePreview').hide();
					$('#imagePreview').fadeIn(650);
				}
				reader.readAsDataURL(input.files[0]);
			}
		}
		$("#imageUpload").change(function() {
			readURL(this);
		});

		$(function () {
			$("#datepicker").datepicker({ 
				autoclose: true, 
				todayHighlight: true,
				    format: 'mm-dd-yyyy',

			})
		});

	</script>