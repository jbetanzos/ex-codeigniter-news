<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <?php echo anchor('/', 'DemoSite News', array('class' => 'navbar-brand')) ?>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <?php if($this->session->userdata('logged_in') === true): ?>
                <div class="navbar-form navbar-right">
                    <div class="form-group">
                        <?php
                        $attributes = array(
                            'class' => 'btn btn-success btn-sm',
                            'role' => 'button'
                        );
                        echo anchor('admin/dashboard/newsList/', 'My News', $attributes);
                        ?>
                    </div>
                    <div class="form-group">
                        <?php
                        $attributes = array(
                            'class' => 'btn btn-success btn-sm',
                            'role' => 'button'
                        );
                        echo anchor('news/create', 'Create a New', $attributes);
                        ?>
                    </div>
                    <div class="form-group">
                        <?php
                        $attributes = array(
                            'class' => 'btn btn-primary btn-sm',
                            'role' => 'button'
                        );
                        echo anchor('user/signoff', 'Sign Off', $attributes);
                        ?>
                    </div>
                </div>
            <?php else: ?>
                <?php
                $attributes = array('id' => 'LoginForm', 'name' => 'LoginForm', 'class' => 'navbar-form navbar-right');
                echo form_open('user/signin', $attributes);
                ?>
                <div class="form-group">
                    <input name="email" id="email" type="text" placeholder="Email" class="form-control">
                </div>
                <div class="form-group">
                    <input name="password" id="password" type="password" placeholder="Password" class="form-control">
                </div>
                <button type="submit" class="btn btn-success">Sign in</button>
                <?php
                echo form_close();
                ?>
            <?php endif; ?>
        </div>
    </div>
</nav>
<br/><br/>