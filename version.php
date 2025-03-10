<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Defines the version of newsletter
 *
 * @package    mod_newsletter
 * @copyright  2015 David Bogner <info@edulabs.org>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$plugin->version   = 2023070203;        // If version == 0 then module will not be installed
$plugin->requires  = 2020061500;        // Requires this Moodle version
$plugin->maturity  = MATURITY_STABLE;   // Maturity
$plugin->release   = 'v2.3.4-NewYorkTimes';  // Already used names: Der Standard, Le Monde Diplomatique
$plugin->component = 'mod_newsletter';  // To check on upgrade, that module sits in correct place
