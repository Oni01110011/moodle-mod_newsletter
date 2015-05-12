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
 * The form for creating and editing newsletter issues
 *
 * @package    mod_newsletter
 * @copyright  2013 Ivan Šakić <ivan.sakic3@gmail.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

global $CFG;
require_once($CFG->libdir . '/formslib.php');

class mod_newsletter_subscription_form extends moodleform {

    /**
     * Defines forms elements
     */
    public function definition() {

        $mform = &$this->_form;
        $data = &$this->_customdata;

        $newsletter = $data['newsletter'];
        $subscription = $data['subscription'];

        $mform->addElement('hidden', 'id', $newsletter->get_course_module()->id);
        $mform->setType('id', PARAM_INT);
        $mform->addElement('hidden', 'subscription', $subscription ? $subscription->id : 0);
        $mform->setType('subscription', PARAM_INT);
        $mform->addElement('hidden', 'action', NEWSLETTER_ACTION_EDIT_SUBSCRIPTION);
        $mform->setType('action', PARAM_ALPHA);

        $mform->addElement('header', 'general', get_string('general', 'form'));
        $mform->addElement('static', 'email', get_string('header_email', 'newsletter'), '');
        $mform->addElement('static', 'name', get_string('header_name', 'newsletter'), '');


        $options = array(
            NEWSLETTER_SUBSCRIBER_STATUS_OK => get_string("health_0", 'newsletter'),
            NEWSLETTER_SUBSCRIBER_STATUS_PROBLEMATIC => get_string("health_1", 'newsletter'),
            NEWSLETTER_SUBSCRIBER_STATUS_BLACKLISTED => get_string("health_2", 'newsletter'),
            NEWSLETTER_SUBSCRIBER_STATUS_UNSUBSCRIBED => get_string("health_4", 'newsletter'),
        );

        $mform->addElement('select', 'health', get_string('header_health', 'newsletter'), $options);
        $mform->setType('health', PARAM_INT);

        $this->add_action_buttons();

        if ($subscription) {
            global $DB;
            $user = $DB->get_record('user', array('id' => $subscription->userid));
            $values = new stdClass();
            $values->email = $user->email;
            $values->name = fullname($user);
            $values->health = $subscription->health;
            $this->set_data($values);
        }
    }
}
