<div class="hitcounter">
    <?php
    if ($ip_details = '') {
        ?>
        <table>
            <?php
            if (empty($this->options)) {
                ?>
                <th>Total hits </th>
                <th><?php echo $hits; ?></th>
                <tr>
                    <td>IP</td>
                    <td><?php echo $ip_details->ip; ?></td>
                </tr>
                <tr>
                    <td>Host Name</td>
                    <td><?php echo $ip_details->hostname; ?></td>
                </tr>
                <tr>
                    <td>Location</td>
                    <td><?php echo $ip_details->loc; ?></td>
                </tr>
                <tr>
                    <td>Organization</td>
                    <td><?php echo $ip_details->org; ?></td>
                </tr>
                <tr>
                    <td>City</td>
                    <td><?php echo $ip_details->city; ?></td>
                </tr>
                <tr>
                    <td>Region</td>
                    <td><?php echo $ip_details->region; ?></td>
                </tr>
                <tr>
                    <td>Country</td>
                    <td><?php echo $ip_details->country; ?></td>
                </tr>
                <tr>
                    <td>Phone</td>
                    <td><?php echo $ip_details->phone; ?></td>
                </tr>
                <?php
            } else {
                ?>
                <?php
                if (!empty($this->options)) {
                    if ($this->options['hits']) {
                        ?>
                        <th>Total hits </th>
                        <th><?php echo $hits; ?></th>
                        <?php
                    }
                }
                ?>

                <?php
                foreach ($this->options as $opt_value) {
                    ?>

                    <tr>
                        <td><?php echo ucfirst($opt_value); ?></td>
                        <td><?php echo $ip_details->$opt_value; ?></td>
                    </tr>
                    <?php
                }
            }
            ?>
        </table>
        <?php
    }else
        echo 'Please run the extension in live server';
    ?>
</div>