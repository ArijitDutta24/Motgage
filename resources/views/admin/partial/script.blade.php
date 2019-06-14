<script src="{{ asset('js/vendors/jquery-3.2.1.min.js') }}"></script>
		<script src="{{ asset('plugins/bootstrap-4.1.3/popper.min.js') }}"></script>
		<script src="{{ asset('plugins/bootstrap-4.1.3/js/bootstrap.min.js') }}"></script>
		<script src="{{ asset('js/vendors/jquery.sparkline.min.js') }}"></script>
		<script src="{{ asset('js/vendors/selectize.min.js') }}"></script>
		<script src="{{ asset('js/vendors/jquery.tablesorter.min.js') }}"></script>
		<script src="{{ asset('js/vendors/circle-progress.min.js') }}"></script>
		<script src="{{ asset('plugins/rating/jquery.rating-stars.js') }}"></script>

		<!--Counters -->
		<script src="{{ asset('plugins/counters/counterup.min.js') }}"></script>
		<script src="{{ asset('plugins/counters/waypoints.min.js') }}"></script>

		<!-- Fullside-menu Js-->
		<script src="{{ asset('plugins/toggle-sidebar/sidemenu.js') }}"></script>

		<!-- Custom scroll bar Js-->
		<script src="{{ asset('plugins/scroll-bar/jquery.mCustomScrollbar.concat.min.js') }}"></script>


		<!-- ECharts Plugin -->
		<script src="{{ asset('plugins/echarts/echarts.js') }}"></script>
		<script src="{{ asset('plugins/echarts/echarts.js') }}"></script>
		<script src="{{ asset('js/index1.js') }}"></script>

		<!-- Custom Js-->
		<script src="{{ asset('js/admin-custom.js') }}"></script>
		<script type="text/javascript">
			var base_url = '{{ url('') }}/'; 
		</script>

		<script type="text/javascript">
			function myFun(id) 
			{

				var delId = id;
				var token = $("meta[name='csrf-token']").attr("content");
				var link = base_url + "admin/category/delete/" +delId;
				var x = confirm("Are you sure you want to delete?");
				
				  if(x)
				  {
					    $.ajax({
						url     : link,
						method  : "delete",
						data    : {'id' : delId, '_token' : token},
						success : function(result){
							window.location= "{{ route('admin.catList') }}";
						}
					});
				  }
				  else
				  {
				    return false;
				  }
				
				
			}
		</script>