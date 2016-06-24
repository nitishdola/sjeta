<ul class="nav nav-list">
	<li class="active">
		<a href="{{ route('admin.home') }}">
			<i class="menu-icon fa fa-tachometer"></i>
			<span class="menu-text"> Dashboard </span>
		</a>

		<b class="arrow"></b>
	</li>
	<li class="">
		<a href="#" class="dropdown-toggle">
			<i class="menu-icon fa fa-list"></i>
			<span class="menu-text"> Budget Category </span>

			<b class="arrow fa fa-angle-down"></b>
		</a>

		<b class="arrow"></b>

		<ul class="submenu">
			<li class="">
				<a href="{{ route('budget_category.create') }}">
					<i class="menu-icon fa fa-caret-right"></i>
					Create
				</a>

				<b class="arrow"></b>
			</li>

			<li class="">
				<a href="{{ route('budget_category.index') }}">
					<i class="menu-icon fa fa-caret-right"></i>
					List All
				</a>

				<b class="arrow"></b>
			</li>
		</ul>
	</li>

	<li class="">
		<a href="#" class="dropdown-toggle">
			<i class="menu-icon fa fa-file-excel-o"></i>
			<span class="menu-text"> Documents </span>

			<b class="arrow fa fa-angle-down"></b>
		</a>

		<b class="arrow"></b>

		<ul class="submenu">
			<li class="">
				<a href="{{ route('documents.upload') }}">
					<i class="menu-icon fa fa-caret-right"></i>
					Upload document
				</a>

				<b class="arrow"></b>
			</li>

			<li class="">
				<a href="{{ route('documents.index') }}">
					<i class="menu-icon fa fa-caret-right"></i>
					List all documents
				</a>

				<b class="arrow"></b>
			</li>
		</ul>
	</li>
</ul><!-- /.nav-list -->