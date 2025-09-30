
                <?php if (isset($_SESSION['response'])) { ?>
                  <div class="alert alert-<?= $_SESSION['type']; ?> alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times </button>
                    <?= $_SESSION['response']; ?>
                  </div>
                <?php unset($_SESSION['response']);
                } ?>
