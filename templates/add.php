<?php
/**
 * ownCloud - ocDownloader
 *
 * This file is licensed under the Affero General Public License version 3 or
 * later. See the COPYING file.
 *
 * @author Xavier Beurois <www.sgc-univ.net>
 * @copyright Xavier Beurois 2015
 */

style ('ocdownloader', 'styles');
script ('ocdownloader', 'script');
?>
<div id="app" class="ocd">
    <div id="app-navigation">
        <?php print_unescaped ($this->inc ('part.navigation')); ?>
    </div>
    <div id="app-content">
        <div id="app-content-wrapper">
            <div class="jumbotron">
                <h1>Manage Your Downloads Anywhere!</h1>
                <p class="lead">Enough dealing with tricky downloads syntax. Manage your downloads via the web easily with <a href="http://aria2.sourceforge.net/manual/en/html/aria2c.html" target="_blank">ARIA2</a>.</p>
            </div>
            <div id="controls">
                <div class="actions">
                    <div class="button" id="new">
        				<a>New Download<div class="icon-caret-dark svg"></div></a>
        				<ul>
        					<li><p data-rel="OCDHTTP">HTTP</p></li>
        					<li><p data-rel="OCDFTP">FTP</p></li>
                            <li><p data-rel="OCDYT">YOUTUBE</p></li>
                            <li><p data-rel="OCDBT">BITTORRENT</p></li>
        				</ul>
        			</div>
                    <div id="loadtext"<?php print ($_['NBELT'] > 0 ? '' : ' style="display: none;"'); ?>>Loading ...</div>
                </div>
                <div class="righttitle">Add Download</div>
            </div>
            <div class="content-page" rel="OCDHTTP">
                <h3>
                    New HTTP download<span class="muted add-msg"></span>
                    <div class="button launch">
        				<a>Launch HTTP Download</a>
                    </div>
                </h3>
                <input type="text" placeholder="HTTP URL to download" class="form-control url" />
                <div class="jumbotron">
                    <h5>Options</h5>
                    <div class="group-option">
                        <label for="option-http-user">Basic Auth User :</label><input type="text" id="option-http-user" placeholder="Username" />
                        <label for="option-http-pwd">Basic Auth Password :</label><input type="password" id="option-http-pwd" placeholder="Password" /> 
                    </div>
                </div>
            </div>
            <div class="content-page" rel="OCDFTP" style="display:none;">
                <h3>
                    New FTP download<span class="muted add-msg"></span>
                    <div class="button launch">
        				<a>Launch FTP Download</a>
                    </div>
                </h3>
                <input type="text" placeholder="FTP URL to download" class="form-control url" />
                <div class="jumbotron">
                    <h5>Options</h5>
                    <div class="group-option">
                        <label for="option-ftp-user">FTP User :</label><input type="text" id="option-ftp-user" placeholder="Username" />
                        <label for="option-ftp-pwd">FTP Password :</label><input type="password" id="option-ftp-pwd" placeholder="Password" /> 
                    </div>
                    <div class="group-option">
                        <label for="option-ftp-pasv">Passive Mode :</label><input type="checkbox" id="option-ftp-pasv" checked />
                    </div>
                </div>
            </div>
            <div class="content-page" rel="OCDYT" style="display:none;">
                <h3>
                    New YouTube download<span class="muted add-msg"></span>
                    <div class="button launch">
        				<a>Launch YouTube Download</a>
                    </div>
                </h3>
                <input type="text" placeholder="YouTube Video URL to download" class="form-control url" />
                <div class="jumbotron">
                    <h5>Options</h5>
                    <div class="group-option">
                        <label for="option-yt-extractaudio">Only Extract audio ?</label><input type="checkbox" id="option-yt-extractaudio" />&nbsp;<i>(No post-processing just extract audio)</i>
                    </div>
                </div>
            </div>
            <div class="content-page" rel="OCDBT" style="display:none;">
                <h3>
                    New BitTorrent download<span class="muted add-msg"></span>
                    <div class="button launch">
        				<a>Launch BitTorrent Download</a>
                    </div>
                </h3>
                <div class="actions">
                    <div class="button" id="torrentlist">
        				<a>Select a file.torrent <i>(Default : list torrent files in the user root folder, check the Personnal Settings panel)</i><div class="icon-caret-dark svg"></div></a>
        				<ul>
        					<li><p data-rel="OCDHTTP">HTTP</p></li>
        					<li><p data-rel="OCDFTP">FTP</p></li>
                            <li><p data-rel="OCDYT">YOUTUBE</p></li>
                            <li><p data-rel="OCDBT">BITTORRENT</p></li>
        				</ul>
        			</div>
                </div>
                <div class="jumbotron">
                    <h5>Options</h5>
                    <i>No options, for now ;-)</i>
                </div>
            </div>
            <div class="content-queue">
                <table border="0" cellspacing="0" cellpadding="0">
                    <thead>
                        <tr>
                            <th width="20%">ID</th>
                            <th width="10%" class="border">PROTOCOL</th>
                            <th width="35%" class="border">INFO</th>
                            <th width="10%" class="border">SPEED</th>
                            <th width="15%" class="border">STATUS</th>
                            <th width="10%"></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php while ($Row = $_['QUEUE']->fetchRow()): ?>
                        <tr data-rel="<?php print($Row['GID']); ?>">
                            <td data-rel="NAME" class="padding"><?php print(strlen ($Row['FILENAME']) > 40 ? substr ($Row['FILENAME'], 0, 40) . '...' : $Row['FILENAME']); ?></td>
                            <td data-rel="PROTO" class="border padding"><?php print($Row['PROTOCOL']); ?></td>
                            <td data-rel="MESSAGE" class="border">
                                <div class="pb-wrap">
                                    <div class="pb-value" style="width: 0%;">
                                        <div class="pb-text">N/A</div>
                                    </div>
                                </div>
                            </td>
                            <td data-rel="SPEED" class="border padding">N/A</td>
                            <td data-rel="STATUS" class="border padding">N/A</td>
                            <td data-rel="ACTION" class="padding"><div class="icon-delete svg"></div></td>
                        </tr>
                    <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>