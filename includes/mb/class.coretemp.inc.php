<?php
/**
 * coretemp sensor class
 *
 * PHP version 5
 *
 * @category  PHP
 * @package   PSI_Sensor
 * @author    Michael Cramer <BigMichi1@users.sourceforge.net>
 * @copyright 2009 phpSysInfo
 * @license   http://opensource.org/licenses/gpl-2.0.php GNU General Public License
 * @version   SVN: $Id: class.coretemp.inc.php 661 2012-08-27 11:26:39Z namiltd $
 * @link      http://phpsysinfo.sourceforge.net
 */
 /**
 * getting hardware temperature information through sysctl
 *
 * @category  PHP
 * @package   PSI_Sensor
 * @author    Michael Cramer <BigMichi1@users.sourceforge.net>
 * @author    William Johansson <radar@radhuset.org>
 * @copyright 2009 phpSysInfo
 * @license   http://opensource.org/licenses/gpl-2.0.php GNU General Public License
 * @version   Release: 3.0
 * @link      http://phpsysinfo.sourceforge.net
 */
class Coretemp extends Sensors
{
    /**
     * get temperature information
     *
     * @return void
     */
    private function _temperature()
    {
        if (CommonFunctions::executeProgram('i2cget', '-y 0x0 0x0a 0x07', $temp$){
                    $dev = new SensorDevice();
                    $dev->setName("CPU");
                    $temp = hexdec($temp);
                    $dev->setValue($temp);
                    $dev->setMax(70);
                    $this->mbinfo->setMbTemp($dev);
        }
    }

    /**
     * get the information
     *
     * @see PSI_Interface_Sensor::build()
     *
     * @return Void
     */
    public function build()
    {
        $this->_temperature();
    }
}
