<?php
/**
 * Created by PhpStorm.
 * User: Zachg
 * Date: 9/23/2018
 * Time: 3:04 AM
 */

namespace App\Controller;

use App\Form\ContactForm;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ContactController extends AbstractController
{
    /**
     * @Route("/", name="Contact us")
     */
    public function index() {

        // show contact form
        $form = $this->createForm(ContactForm::class);
        return $this->render('contact/index.html.twig', [
            'our_form' => $form->createView(),
        ]);
        // to do: make datetime and id auto-generate: uniqid()
        // persist the request into the SQL database
        // show the records (one at a time w pagination links for more), new records, and specific records in their own paths
        // add anti-bot protection on the contact form
        // style the contact request display page
        // add a menu/navigation on top of the contact request display page to allow seamless switching between displaying new, or all contact requests
        // mark a contact request as read when displayed (set isRead field to true)

    }

    /**
     * @Route("/records")
     */
    public function showRecords()
    {
        //Records:
        //One contact request at a time is being displayed. If more than one contact request is
        //available in the current path, pagination links are shown.
        return new Response('Records:');
    }

    /**
     * @Route("/records/new")
     */
    public function showNewRecords() {

        return new Response('Newest Record:');
    }

    /**
     * @Route("/records/{uuid}")
     */
    public function showIndividualRecords($uuid) {

        //Record {uuid}:
        return new Response(sprintf(
            'Record: ',
            $uuid
        ));
    }
}