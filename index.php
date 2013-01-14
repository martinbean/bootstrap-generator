<?php
    if (isset($_POST['generate'])) {
        
        require 'includes/lessc.inc.php';
        
        try {
            $find = array();
            $repl = array();
            $variables = array(
                'linkColor', 'linkColorHover',
                'black', 'white',
                'blue', 'blueDark', 'green', 'red', 'yellow', 'orange', 'pink', 'purple',
                'basefont', 'baseline',
                'gridColumns', 'gridColumnWidth', 'gridGutterWidth',
                'sansSerifFontFamily', 'serifFontFamily', 'monospaceFontFamily'
            );
            foreach ($variables as $var) {
                $find[] = '%' . $var . '%';
                $repl[] = $_POST[$var];
            }
            
            $lessFiles = array('reset', 'variables', 'mixins', 'scaffolding', 'type', 'forms', 'tables', 'patterns');
            $lessString = '';
            foreach ($lessFiles as $lessFileName) {
                $lessString.= file_get_contents('lib/'.$lessFileName.'.less') . PHP_EOL;
            }
            $lessString = str_replace($find, $repl, $lessString);
            
            header('Cache-Control: public');
            header('Content-Description: File Transfer');
            header('Content-Disposition: attachment; filename=bootstrap.css');
            header('Content-Type: text/css');
            header('Content-Transfer-Encoding: binary');
            
            $less = new lessc();
            echo $less->parse($lessString);
            exit;
        }
        catch (Exception $e) {
            $error = $e->getMessage();
        }
    }
?>
<!DOCTYPE html>
<html lang="en-us">
  <head>
    <meta charset="utf-8" />
    <meta name="author" content="Martin Bean" />
    <title>Twitter Bootstrap Generator</title>
    <link rel="stylesheet" href="http://twitter.github.com/bootstrap/1.4.0/bootstrap.min.css" media="screen" />
    <style media="screen">
        #main-wrap {
            padding-top: 60px;
        }
        .container {
            width: auto;
            padding: 0 17px;
        }
        @media only screen and (min-width: 1024px) {
            .container {
                width: 940px;
                padding: inherit 0;
            }
        }
    </style>
    <script>
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-4799998-6']);
        _gaq.push(['_trackPageview']);
        (function() {
            var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
        })();
    </script>
  </head>
  <body>
    <div class="topbar">
      <div class="topbar-inner">
        <div class="container">
          <span class="brand">Bootstrap Generator</span>
        </div>
      </div>
    </div>
    <div class="container" id="main-wrap">
      <div class="alert-message">
        <a href="#" class="close">&times;</a>
        <p><strong>Just a note:</strong> the Bootstrap Generator is for use with version 1.4 only. Twitter introduced a customized download facility with version 2.0 of Bootstrap, which you can find at <a href="http://twitter.github.com/bootstrap/customize.html" rel="external">http://twitter.github.com/bootstrap/customize.html</a>.</p>
      </div>
<?php if ($error): ?>
      <div class="alert-message error">
        <a href="#" class="close">&times;</a>
        <p><strong>Oh, snap!</strong> An error occurred. Sorry about that! Please try again later.</p>
      </div>
<?php endif; ?>
      <div class="hero-unit">
        <h1>Bootstrap Generator</h1>
        <p>Kick-start your Twitter Bootstrap project the way <strong>you</strong> want. Simply alter the options below and click &quot;Generate&quot; to get your compiled Bootstrap <abbr title="Cascading Style Sheet">CSS</abbr> file.</p>
      </div>
      <div class="page-header">
        <h1>Options <small>Let&rsquo;s get started&hellip;</small></h1>
      </div>
      <form action="<?php echo str_replace('index.php', '', $_SERVER['PHP_SELF']); ?>" method="post" accept-charset="utf-8">
        <fieldset>
          <legend>Links</legend>
          <div class="clearfix">
            <label for="linkColor">Link Color</label>
            <div class="input">
              <input type="text" name="linkColor" value="#0069d6" id="linkColor" class="medium" />
              <span class="help-inline">Usually a <abbr title="hexadecimal">hex.</abbr> code, i.e. #0069d6</span>
            </div>
          </div>
          <div class="clearfix">
            <label for="linkColorHover">Link Hover Color</label>
            <div class="input">
              <input type="text" name="linkColorHover" value="darken(@linkColor, 15)" id="linkColorHover" class="medium" />
              <span class="help-inline">Either a hex. code or a LESS function, i.e. darken(@linkColor, 15)
            </div>
          </div>
        </fieldset>
        <fieldset>
          <legend>Grays</legend>
          <div class="clearfix">
            <label for="black">Black</label>
            <div class="input">
              <input type="text" name="black" value="#000000" id="black" class="small" />
            </div>
          </div>
          <div class="clearfix">
            <label for="white">White</label>
            <div class="input">
              <input type="text" name="white" value="#ffffff" id="white" class="small" />
            </div>
          </div>
        </fieldset>
        <fieldset>
          <legend>Accent Colors</legend>
          <div class="clearfix">
            <label for="blue">Blue</label>
            <div class="input">
              <input type="text" name="blue" value="#049CDB" id="blue" class="small" />
            </div>
          </div>
          <div class="clearfix">
            <label for="blueDark">Blue Dark</label>
            <div class="input">
              <input type="text" name="blueDark" value="#0064CD" id="blueDark" class="small" />
            </div>
          </div>
          <div class="clearfix">
            <label for="green">Green</label>
            <div class="input">
              <input type="text" name="green" value="#46a546" id="green" class="small" />
            </div>
          </div>
          <div class="clearfix">
            <label for="red">Red</label>
            <div class="input">
              <input type="text" name="red" value="#9d261d" id="red" class="small" />
            </div>
          </div>
          <div class="clearfix">
            <label for="yellow">Yellow</label>
            <div class="input">
              <input type="text" name="yellow" value="#ffc40d" id="yellow" class="small" />
            </div>
          </div>
          <div class="clearfix">
            <label for="orange">Orange</label>
            <div class="input">
              <input type="text" name="orange" value="#f89406" id="orange" class="small" />
            </div>
          </div>
          <div class="clearfix">
            <label for="pink">Pink</label>
            <div class="input">
              <input type="text" name="pink" value="#c3325f" id="pink" class="small" />
            </div>
          </div>
          <div class="clearfix">
            <label for="purple">Purple</label>
            <div class="input">
              <input type="text" name="purple" value="#7a43b6" id="purple" class="small" />
            </div>
          </div>
        </fieldset>
        <fieldset>
          <legend>Baseline Grid</legend>
          <div class="clearfix">
            <label for="basefont">Base Font Size</label>
            <div class="input">
              <input type="number" name="basefont" value="13" id="basefont" class="mini" />
              <abbr class="help-inline" title="pixels">px</abbr>
            </div>
          </div>
          <div class="clearfix">
            <label for="baseline">Base Line Height</label>
            <div class="input">
              <input type="number" name="baseline" value="18" id="baselink" class="mini" />
              <abbr class="help-inline" title="pixels">px</abbr>
            </div>
          </div>
        </fieldset>
        <fieldset>
          <legend>Grid</legend>
          <div class="clearfix">
            <label for="gridColumns">Grid Columns</label>
            <div class="input">
              <input type="number" name="gridColumns" value="16" id="gridColumns" class="mini" />
            </div>
          </div>
          <div class="clearfix">
            <label for="gridColumnWidth">Grid Column Width</label>
            <div class="input">
              <input type="number" name="gridColumnWidth" value="40" id="gridColumnWidth" class="mini" />
              <abbr class="help-inline" title="pixels">px</abbr>
            </div>
          </div>
          <div class="clearfix">
            <label for="gridGutterWidth">Grid Gutter Width</label>
            <div class="input">
              <input type="number" name="gridGutterWidth" value="20" id="gridGutterWidth" class="mini" />
              <abbr class="help-inline" title="pixels">px</abbr>
            </div>
          </div>
        </fieldset>
        <fieldset>
          <legend>Font Families</legend>
          <div class="clearfix">
            <label for="sansSerifFontFamily">Sans Serif</label>
            <div class="input">
              <input type="text" name="sansSerifFontFamily" value="&quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif" id="sansSerifFontFamily" class="xlarge" />
              <span class="help-inline">No ending semi-colon is required.</span>
            </div>
          </div>
          <div class="clearfix">
            <label for="serifFontFamily">Serif</label>
            <div class="input">
              <input type="text" name="serifFontFamily" value="&quot;Georgia&quot;, Times New Roman, Times, serif" id="serifFontFamily" class="xlarge" />
              <span class="help-inline">No ending semi-colon is required.</span>
            </div>
          </div>
          <div class="clearfix">
            <label for="monospaceFontFamily">Monospace</label>
            <div class="input">
              <input type="text" name="monospaceFontFamily" value="Monaco, &quot;Courier New&quot;, monospace" id="monospaceFontFamily" class="xlarge" />
              <span class="help-inline">No ending semi-colon is required.</span>
            </div>
          </div>
        </fieldset>
        <div class="actions">
          <input type="submit" name="generate" value="Generate" class="btn large primary" />
        </div>
      </form>
      <footer>
        <p>Developed by <a href="http://www.martinbean.co.uk/" rel="external">Martin Bean</a></p>
      </footer>
    </div>
    <a href="http://github.com/martinbean/bootstrap-generator/" rel="external"><img style="position: absolute; top: 0; right: 0; border: 0; z-index: 10001;" src="https://a248.e.akamai.net/assets.github.com/img/71eeaab9d563c2b3c590319b398dd35683265e85/687474703a2f2f73332e616d617a6f6e6177732e636f6d2f6769746875622f726962626f6e732f666f726b6d655f72696768745f677261795f3664366436642e706e67" alt="Fork me on GitHub"></a>
    <script src="//code.jquery.com/jquery-1.7.1.min.js"></script>
    <script>
        $(document).ready(function() {
            $('a[rel=external]').click(function(e) {
                e.preventDefault();
                window.open(this.href);
            });
            $('a.close').click(function(e) {
                e.preventDefault();
                $(this).parent().fadeTo('fast', 0.01).slideUp('fast', function() {
                    $(this).remove();
                });
            });
        });
    </script>
  </body>
</html>
