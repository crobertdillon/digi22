<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="height:65px;">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="/"><?php echo $this->Html->image('tblogo_small.png', ['alt' => 'Tribune Broadcasting']); ?><span>Digital</span>SMS</a>
            <ul class="user-menu">
                <li class="dropdown pull-right">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> User <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="/Users/view/<?= $this->AuthUser->id() ?>"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Profile</a></li>
                        <li><a href="/Users/edit/<?= $this->AuthUser->id() ?>"><svg class="glyph stroked gear"><use xlink:href="#stroked-gear"></use></svg> Settings</a></li>
                        <li><a href="/Users/logout/"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>

    </div><!-- /.container-fluid -->
</nav>