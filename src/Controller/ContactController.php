<?php
/**
 * Created by PhpStorm.
 * User: Zachg
 * Date: 9/23/2018
 * Time: 3:04 AM
 */

namespace App\Controller;

use App\Form\ContactForm;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Constraints as Assert;

class ContactController extends Controller
{
    /**
     * @Route("/", name="Contact Us!")
     */
    public function index(Request $request)
    {
        // Here we create the contact form:
        $form = $this->createFormBuilder()
            ->add('name', TextType::class, array(
                'attr' => array('style' => 'width: 200px')),

                // this doesn't actually do anything:
                new Assert\Length(array(
                'min'        => 1,
                'max'        => 20,
            )))
            ->add('email', EmailType::class, array(
                'attr' => array('style' => 'width: 200px')))
            ->add('message', TextType::class)
            ->add('submit', SubmitType::class)
            ->getForm();

        $form->handleRequest($request);

        return $this->render('contact/index.html.twig', [
            'contact_form' => $form->createView() ]);

        // to do:
        // cap input length in fields
        // actually save the data into the SQL table
        // show the records (one at a time w pagination links for more), new records, and specific records in their own paths
        // add anti-bot protection on the contact form
        // style the contact request display page
        // mark a contact request as read when displayed (set isRead field to true)
        // set character limits to input fields

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

        // Newest Record shows the newest id record entered.
        return new Response('Newest Record:');
    }

    /**
     * @Route("/records/{uuid}")
     */
    public function showIndividualRecords($uuid) {

        //Record {uuid}: shows the specific record corresponding to the id entered
        //<form class="navbar-form navbar-left" action="/action_page.php">
        //                <div class="form-group">
        //                    <input type="text" class="form-control" placeholder="Input ID number:">
        //                </div>
        //            </form>
        return new Response(sprintf(
            'Record: ',
            $uuid
        ));
    }
}