<?php
namespace App\Controller;
use Psr\Log\LoggerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;
use Symfony\Component\HttpFoundation\Cookie;

use App\Entity\AabAdmin;
use Doctrine\ORM\EntityManagerInterface;

/**
 * @Route("/admin", name="admin_")
 */
class AdminController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function adminhome($logginner=0)
    {
        if ($this->check_login($logginner))
        {
            echo "belépve";
            return $this->render('admin/index.html.twig');
        }else{
            echo "nincs belépve";
            return $this->render('admin/login.html.twig');
        }
    }
    /**
     * @Route("/admin/login_in/")
     */
    public function check_login($logginner=0)
    {
        $request = Request::createFromGlobals();


        $loggedin=$request->cookies->get('login');


        if ($logginner==1)
        {
            return true;
        }else{
            return false;
        }
    }
    /**
     * @Route("/admin/login", name="admin_login" ,methods={"POST"})
     */
    public function admin_login( Request $request)
    {


        $name=$request->get('name');
        $pass=$request->get('password');
        $success=false;
        $msg="";
        if ($name == 'admin')
        {
            $msg.= "username: ".$name;


            $success=true;
        }else{
            $msg.= "hibás felhasználónév, írd be: admin";
            $success=false;
        }

        if ($success)
        {

            $useradmin = $this->getDoctrine()
                ->getRepository(AabAdmin::class)
                ->findOneBy(['name' => $name]);


            if (!$useradmin)
            {
              /*  $entityManager = $this->getDoctrine()->getManager();

                $product = new AabAdmin();
                $product->setName('admin');
                $product->setPassword('admin');
                $product->setLastLogin(new \DateTime());

                // tell Doctrine you want to (eventually) save the Product (no queries yet)
                $entityManager->persist($product);

                // actually executes the queries (i.e. the INSERT query)
                $entityManager->flush();

              */
                $msg.= 'nincs ilyen felhasználónév: '.$name;
                return new Response('hiba: '.$msg);
            }else{

                $entityManager = $this->getDoctrine()->getManager();
                $useradmin->setLastLogin(new \DateTime());
    $entityManager->flush();

            }

            $response= $this->render('admin/index.html.twig');
          //  $response=  Response('User ID: '.$name.', name: '.$useradmin->getName());
        }else{

            $response= $this->render('admin/login.html.twig');
         //   $response=  Response('hiba: '.$msg);
        }
        return $response;

        //$result = array('message' => '');
        //$response = $this->render('admin/index.html.twig', $result);
        //$response = $this->adminhome($cookie);


        //$response->headers->setCookie(new Cookie('login', $cookie, time() + 3600 * 24 * 7));
        //return new RedirectResponse('/' . $lang);



       // return $response;


    }

    /**
     * @Route("/admin/logout", name="admin_logout")
     */
    public function admin_logout()
    {
    $response = $this->render('admin/login.html.twig');
    $response->headers->setCookie(new Cookie('login', '0', time() + 3600 * 24 * 7));




        return $response;
    }

//???? ez még kérdése
    public function sql_query()
    {
        $conn = $this->getEntityManager()
            ->getConnection();
        $sql = 'SELECT * FROM aab_teszt';
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        var_dump($stmt->fetchAll());die;
    }



    /**
     * @Route("/admin/user/{id}", name="admin_user_show")
     */
    public function show_admin($id)
    {
        $product = $this->getDoctrine()
            ->getRepository(AabAdmin::class)
            ->find($id);

        if (!$product) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }
       // return new Response('User ID: '.$id.", name: ".$product->getName());

        // or render a template
        // in the template, print things with {{ product.name }}
         return $this->render('admin/index.html.twig', ['user' => $product]);
    }


    /**
     * @Route("/admin/all_users", name="admin_all_users")
     */
    public function show_all_admin()
    {
        $product = $this->getDoctrine()
            ->getRepository(AabAdmin::class)
            ->findAll();

        // return new Response('User ID: '.$id.", name: ".$product->getName());

        // or render a template
        // in the template, print things with {{ product.name }}
        return $this->render('admin/index.html.twig', ['users' => $product]);
    }


    /**
     * @Route("/admin/new_user", name="add_new_user")
     */
       public function add_new_user()
    {
        $product = $this->getDoctrine()
            ->getRepository(AabAdmin::class)
            ->findAll();

        // return new Response('User ID: '.$id.", name: ".$product->getName());

        // or render a template
        // in the template, print things with {{ product.name }}
        return $this->render('admin/useradd.html.twig', ['users' => $product]);
    }

}