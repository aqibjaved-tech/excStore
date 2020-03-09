<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Redirect;
use View;

//use App\Account;
use Illuminate\Http\Request;

class CommonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    private  $newDomainName;
    public function setNewDomainName(){
        $sdn = app('request')->get('sdn');
        if($sdn != 'sundiego') {
            $this->newDomainName = $sdn;
        } else {
            $this->newDomainName = 'sundiego';
        }
    }
    public function getNewDomainName(){
        return $this->newDomainName;
    }
    public function checkDomainName($dn) {
        if($dn == "excStore") {
            return false;
        } else {
            return $dn;
        }
    }
    public function getDomainName($domain) {
        if($domain[0] == "www") {
            return $domain[1];
        } else {
            return $domain[0];
        }
    }
    public function index(Request $request){

      $subdomain = $this->getDomainName($fullDomain);
        $result = $this->checkDomainName($subdomain);
        if(!$result) {
            return Redirect::to('http://exchangecollective.com/');
        }
      $arrContextOptions = array(
                              "ssl"=>array(
                                  "verify_peer"=>false,
                                  "verify_peer_name"=>false,
                              ),
                          );
      $content = file_get_contents("https://exc-staging-pr-5.herokuapp.com/api/v2/accountInfo?domainName=".$subdomain, false, stream_context_create($arrContextOptions));
      $result  = json_decode($content);
      @$data = $result;
      return View::make('/template/admin/pages/dashboard/index',compact('data'));
     }
    public function getData(Request $request){
        $subdomain = $this->getDomainName($fullDomain);
        $result = $this->checkDomainName($subdomain);
        if(!$result) {
            return Redirect::to('http://exchangecollective.com/');
        } else {
            
        }
        $arrContextOptions = array(
                                "ssl"=>array(
                                    "verify_peer"=>false,
                                    "verify_peer_name"=>false,
                                ),
                            );
        $content = file_get_contents("https://exc-staging-pr-5.herokuapp.com/api/v2/accountInfo?domainName=".$subdomain, false, stream_context_create($arrContextOptions));

        $result  = json_decode($content);
    }
    public function getSettings(Request $request){
        $subdomain = $this->getDomainName($fullDomain);
        $result = $this->checkDomainName($subdomain);
        if(!$result) {
            return Redirect::to('http://exchangecollective.com/');
        } else {
            
        }
        $arrContextOptions = array(
                                "ssl"=>array(
                                    "verify_peer"=>false,
                                    "verify_peer_name"=>false,
                                ),
                            );
        $content = file_get_contents("https://exc-staging-pr-5.herokuapp.com/api/v2/accountInfo?domainName=".$subdomain, false, stream_context_create($arrContextOptions));
        $result  = json_decode($content);
        @$data = $result;
        return View::make('/template/admin/pages/dashboard/settings',compact('data'));
    }
    public function ourFaq(Request $request){
        $subdomain = $this->getDomainName($fullDomain);
        $result = $this->checkDomainName($subdomain);
        if(!$result) {
            return Redirect::to('http://exchangecollective.com/');
        } else {
            
        }
        $arrContextOptions = array(
                                "ssl"=>array(
                                    "verify_peer"=>false,
                                    "verify_peer_name"=>false,
                                ),
                            );
        $content = file_get_contents("https://exc-staging-pr-5.herokuapp.com/api/v2/accountInfo?domainName=".$subdomain, false, stream_context_create($arrContextOptions));
        $result  = json_decode($content);
        @$data = $result;
        return View::make('/template/admin/pages/dashboard/faq',compact('data'));
    }
    public function watchVideo(Request $request){
        $subdomain = $this->getDomainName($fullDomain);
        $result = $this->checkDomainName($subdomain);
        if(!$result) {
            return Redirect::to('http://exchangecollective.com/');
        } else {
            
        }
        $arrContextOptions = array(
                                "ssl"=>array(
                                    "verify_peer"=>false,
                                    "verify_peer_name"=>false,
                                ),
                            );
        $content = file_get_contents("https://exc-staging-pr-5.herokuapp.com/api/v2/accountInfo?domainName=".$subdomain, false, stream_context_create($arrContextOptions));

        $result  = json_decode($content);
        @$data = $result;
        return View::make('/template/admin/pages/dashboard/video',compact('data'));
    }
    public function gettingStarted(Request $request){
        $subdomain = $this->getDomainName($fullDomain);
        $result = $this->checkDomainName($subdomain);
        if(!$result) {
            return Redirect::to('http://exchangecollective.com/');
        } else {
            
        }
        $arrContextOptions = array(
                                "ssl"=>array(
                                    "verify_peer"=>false,
                                    "verify_peer_name"=>false,
                                ),
                            );
        $content = file_get_contents("https://exc-staging-pr-5.herokuapp.com/api/v2/accountInfo?domainName=".$subdomain, false, stream_context_create($arrContextOptions));
        $result  = json_decode($content);
        @$data = $result;
        return View::make('/template/admin/pages/dashboard/gettingstarted',compact('data'));
    }

}
