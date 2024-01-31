<?php

namespace App\Http\Controllers\api\v1\salon\bo;

use App\Http\Controllers\api\v1\dto\ServicesDTO;
use App\Http\Controllers\Controller;
use App\Http\Controllers\api\v1\dto\BusinessInterface;
use App\Http\Controllers\api\v1\dto\SalonDTO;
use App\Http\Controllers\api\v1\dto\AppDTO;
use App\Http\Controllers\api\v1\dto\UserOtpDTO;
use App\Http\Controllers\api\v1\util\APICodes;
use App\Models\api\v1\salon\SalonGallery;
use App\Models\api\v1\salon\SalonServices;
use App\Models\api\v1\salon\SalonMaster;
use App\Models\api\v1\salon\WorkStyle;
use App\Models\api\v1\salon\ServiceType;
use App\Models\api\v1\salon\Bank;
use App\Models\api\v1\salon\BusinessType;
use App\Models\api\v1\salon\SalonBranches;
use App\Models\api\v1\salon\SalonEmployee;
use App\Http\Controllers\api\v1\dto\SalonEmployeeDTO;
use App\Http\Controllers\api\v1\dto\SalonBranchesDTO;
use App\Http\Controllers\api\v1\util\JsonHandler;
use App\Http\Controllers\api\v1\sns\bo\BUserOtp;
use Random\RandomError;
use App\Http\Controllers\api\v1\dto\JsonHandlerDTO;

class BSalon extends Controller implements BusinessInterface {

    public function SalonGalleryAndLogo(SalonDTO $salonDTO) {
        //Salon Logo 
        $salonLogo = $salonDTO->getSalonLogo();
        $salonLogo_name = md5(Rand(1000, 10000));
        $salonLogo_ext = strtolower($salonLogo->getClientOriginalExtension());
        $salonLogo_full_name = $salonLogo_name . "." . $salonLogo_ext;
        $salonLogo_url = AppDTO::$salonLogoPath . "." . $salonLogo_full_name;
        $salonLogo->move(AppDTO::$salonLogoPath, $salonLogo_full_name);

        // Salon Gallery 

        $salonGallery = $salonDTO->getSalonGallery();
        $Galleries = array();
        $images = $salonGallery;
        if ($images = $salonGallery) {
            foreach ($images as $image) {
                $salonGallery_name = md5(rand(1000, 10000));
                $salonGallery_ext = strtolower($image->getClientOriginalExtension());
                $salonGallery_full_name = $salonGallery_name . "." . $salonGallery_ext;
                $salonGallery_url = AppDTO::$salonGalleryPath . "." . $salonGallery_full_name;
                $image->move(AppDTO::$salonGalleryPath, $salonGallery_full_name);

                $Galleries[] = $salonGallery_full_name;
            }
        }
        $salonDTO->setSalonLogo($salonLogo_full_name);
        $salonDTO->setSalonGallery(implode('|', $Galleries));
        $salon_Gallery = new SalonGallery();
        $salon = $salon_Gallery->saveObject($salonDTO);
        if ($salonDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {
            //$response['Status'] = APICodes::$TRANSACTION_SUCCESS;
            //$response['Message'] = "Successfully Created!";
            //$response['SalonGallery'] = $salon; //SalonGallery Object
            /* $response=['Message'=>"Successfully Created!",
              'isSucces'=>APICodes::$TRANSACTION_SUCCESS,
              'jsonData'=>['SalonGallery'=>$salon]]; */
            $jsonHandlerDto = new JsonHandlerDTO();
            $jsonHandlerDto->setMessage("Successfully Created!");
            $jsonHandlerDto->setResultHead('SalonGallery');
            $jsonHandlerDto->setIsSuccess(APICodes::$TRANSACTION_SUCCESS);
            $jsonHandlerDto->setResultInArr($salon);
            return JsonHandler::getJsonMessage($jsonHandlerDto);
        } else {
            return AppDTO::$TRUE_AS_STRING;
        }
    }

    public function lstDefaultServices(ServicesDTO $servicesDTO) {
        $salonservicesModel = new SalonServices();
        $salonservices = $salonservicesModel->lstDefaultServices($servicesDTO);
        if ($salonservices) {
            if ($servicesDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {
                //$response['Status'] = APICodes::$TRANSACTION_SUCCESS;
                //$response['Message'] = "Salone Services Details ";
                //$response['data'] = $salonservices; //salone services Object
                /* $response=['Message'=>"Salone Services Details",
                  'isSucces'=>APICodes::$TRANSACTION_SUCCESS,
                  'jsonData'=>['SaloneServicesDetails'=>$salonservices]]; */
                $jsonHandlerDto = new JsonHandlerDTO();
                $jsonHandlerDto->setMessage("Salone Services Details");
                $jsonHandlerDto->setResultHead('SaloneServicesDetails');
                $jsonHandlerDto->setIsSuccess(APICodes::$TRANSACTION_SUCCESS);
                $jsonHandlerDto->setResultInArr($salonservices[0]);
                return JsonHandler::getJsonMessage($jsonHandlerDto);
            } else {
                return AppDTO::$TRUE_AS_STRING;
            }
        } else {
            if ($servicesDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {
                //$response['Status'] = APICodes::$TRANSACTION_FAILUE;
                //$response['Message'] = "Something went wrong!";
                /* $response=['Message'=>"Something went wrong!",
                  'isSucces'=>APICodes::$TRANSACTION_FAILUE,
                  'jsonData'=>[]]; */
                $jsonHandlerDto = new JsonHandlerDTO();
                $jsonHandlerDto->setMessage("Something went wrong!");
                $jsonHandlerDto->setIsSuccess(APICodes::$TRANSACTION_FAILUE);

                return JsonHandler::getJsonMessage($jsonHandlerDto);
            } else {
                return AppDTO::$FALSE_AS_STRING;
            }
        }
    }

    public function saveDefaultServices(ServicesDTO $servicesDTO) {
        $salonservicesModel = new SalonServices();
        $salonservices = $servicesDTO->getSalonServices();
        $serviceDTO = new ServicesDto();
        foreach ($salonservices as $salonservice) {
            $serviceDTO->setUserPhoneNo($servicesDTO->getUserPhoneNo());
            $serviceDTO->setCategoryId($servicesDTO->getCategoryId());
            $serviceDTO->setSubcategoryId($salonservice['subcategoryId']);
            $serviceDTO->setServiceDescription($salonservice['serviceDescription']);
            $serviceDTO->setIsServingFemales($salonservice['servingFemales']);
            $serviceDTO->setIsServingMales($salonservice['servingMales']);
            $serviceDTO->setServiceDuration($salonservice['serviceDuration']);
            $serviceDTO->setServicePrice($salonservice['servicePrice']);
            $serviceDTO->setIsactive($salonservice['isactive']);
            $salonservicesModel->saveDefaultServices($serviceDTO);
        }
        $updatedServices = $salonservicesModel->lstDefaultServices($servicesDTO);
        if ($servicesDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {
            //$response['Status'] = APICodes::$TRANSACTION_SUCCESS;
            //$response['Message'] = "Successfully Saved!";
            //$response['data'] = $updatedServices; //salone services Object
            /* $response=[ 'Message'=>"Successfully Saved!",
              'isSucces'=>APICodes::$TRANSACTION_SUCCESS,
              'jsonData'=>['SaloneServicesDetails'=>$updatedServices]]; */
            $jsonHandlerDto = new JsonHandlerDTO();
            $jsonHandlerDto->setMessage("Successfully Saved!");
            $jsonHandlerDto->setResultHead('SaloneServicesDetails');
            $jsonHandlerDto->setIsSuccess(APICodes::$TRANSACTION_SUCCESS);
            $jsonHandlerDto->setResultInArr($updatedServices[0]);
            return JsonHandler::getJsonMessage($jsonHandlerDto);
        } else {
            return AppDTO::$TRUE_AS_STRING;
        }
    }

    public function lstSalonData(SalonDTO $salonDTO) {
        $salonMasterModel = new SalonMaster();
        $salonData = $salonMasterModel->getSalonDataByPhoneNumber($salonDTO->getUserPhoneNo());
        if (!$salonData->isempty()) {
            if ($salonDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {
                //$response['Status'] = APICodes::$TRANSACTION_SUCCESS;
                //$response['Message'] = "Salone Master Data ";
                //$response['SalonData'] = $salonData; //salone Data Object

                /* $response=[ 'Message'=>"Salone Master Data",
                  'isSucces'=>APICodes::$TRANSACTION_SUCCESS,
                  'jsonData'=>['SaloneDetails'=>$salonData]]; */
                $jsonHandlerDto = new JsonHandlerDTO();
                $jsonHandlerDto->setMessage("Salone Master Data!");
                $jsonHandlerDto->setResultHead('SaloneDetails');
                $jsonHandlerDto->setIsSuccess(APICodes::$TRANSACTION_SUCCESS);

                $jsonHandlerDto->setResultInArr($salonData[0]);
                return JsonHandler::getJsonMessage($jsonHandlerDto);
            } else {
                return AppDTO::$TRUE_AS_STRING;
            }
        } else {
            if ($salonDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {
                //$response['Status'] = APICodes::$TRANSACTION_DATA_NOT_FOUND;
                //$response['Message'] = "Salon does not exist!";
                /* $response=[ 'Message'=>"Salon does not exist!",
                  'isSucces'=>APICodes::$TRANSACTION_DATA_NOT_FOUND,
                  'jsonData'=>[]]; */
                $jsonHandlerDto = new JsonHandlerDTO();
                $jsonHandlerDto->setMessage("Salon does not exist!");
                $jsonHandlerDto->setIsSuccess(APICodes::$TRANSACTION_DATA_NOT_FOUND);

                return JsonHandler::getJsonMessage($jsonHandlerDto);
            } else {
                return AppDTO::$FALSE_AS_STRING;
            }
        }
    }

    public function saveSalonData(SalonDTO $salonDTO) {
        $salonMasterModel = new SalonMaster();
        $salonData = $salonMasterModel->getSalonDataByPhoneNumber($salonDTO->getUserPhoneNo());

        if (!$salonData->isEmpty()) {
            $salonDTO->setSalonId($salonData[0]->id);
            $salonData = $salonMasterModel->updateSalonData($salonDTO);
        } else {
            $salonData = $salonMasterModel->SaveSalonData($salonDTO);
        }

        if ($salonDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {
            //$response['Status'] = APICodes::$TRANSACTION_SUCCESS;
            //$response['Message'] = "Successfully Saved!";
            //$response['SalonData'] = $salonData; //salone data Object
            /* $response=[ 'Message'=>"Successfully Saved!",
              'isSucces'=>APICodes::$TRANSACTION_SUCCESS,
              'jsonData'=>['SaloneDetails'=>$salonData]]; */
            $jsonHandlerDto = new JsonHandlerDTO();
            $jsonHandlerDto->setMessage("Successfully Saved!");
            $jsonHandlerDto->setResultHead('SaloneDetails');
            $jsonHandlerDto->setIsSuccess(APICodes::$TRANSACTION_SUCCESS);
            $jsonHandlerDto->setResultInArr($salonData);
            return JsonHandler::getJsonMessage($jsonHandlerDto);
        } else {
            return AppDTO::$TRUE_AS_STRING;
        }
    }

    public Function LstWorkStyles(SalonDTO $salonDTO) {
        $WorkStyleModel = new WorkStyle();
        $WorkStylesData = $WorkStyleModel->listAll();
        if ($salonDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {
            //$response['Status'] = APICodes::$TRANSACTION_SUCCESS;
            //$response['Message'] = "Work Styles List ";
            //$response['WorkStyleList'] = $WorkStylesData; // Work Styles Data Object
            /* $response=['Message'=>"Work Styles List ",
              'isSucces'=>APICodes::$TRANSACTION_SUCCESS,
              'jsonData'=>['WorkStyleList'=>$WorkStylesData]]; */
            $jsonHandlerDto = new JsonHandlerDTO();
            $jsonHandlerDto->setMessage("Work Styles List");
            $jsonHandlerDto->setResultHead('WorkStyleList');
            $jsonHandlerDto->setIsSuccess(APICodes::$TRANSACTION_SUCCESS);
            $jsonHandlerDto->setResultInArr($WorkStylesData);
            return JsonHandler::getJsonMessage($jsonHandlerDto);
        } else {
            return AppDTO::$TRUE_AS_STRING;
        }
    }

    public Function LstServiceTypes(SalonDTO $salonDTO) {
        $serviceTypeModel = new ServiceType();
        $serviceType = $serviceTypeModel->listAll();
        if ($salonDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {
            //$response['Status'] = APICodes::$TRANSACTION_SUCCESS;
            //$response['Message'] = "Service Types List ";
            //$response['ServiceTypeList'] = $serviceType; // Service Types List Data Object

            /* $response=[ 'Message'=>"Service Type List",
              'isSucces'=>APICodes::$TRANSACTION_SUCCESS,
              'jsonData'=>['ServiceTypeList'=>$serviceType]]; */
            $jsonHandlerDto = new JsonHandlerDTO();
            $jsonHandlerDto->setMessage("Service Type List");
            $jsonHandlerDto->setResultHead('ServiceTypeList');
            $jsonHandlerDto->setIsSuccess(APICodes::$TRANSACTION_SUCCESS);
            $jsonHandlerDto->setResultInArr($serviceType);
            return JsonHandler::getJsonMessage($jsonHandlerDto);
        } else {
            return AppDTO::$TRUE_AS_STRING;
        }
    }

    public Function lstBusinessTypes(SalonDTO $salonDTO) {
        $businessTypeModel = new BusinessType();
        $businessType = $businessTypeModel->listAll();
        if ($salonDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {
            //$response['Status'] = APICodes::$TRANSACTION_SUCCESS;
            //$response['Message'] = "Business Types List ";
            //$response['BusinessTypeList'] = $businessType; // Business Types List Data Object
            /* $response=[ 'Message'=>"Business Type List",
              'isSucces'=>APICodes::$TRANSACTION_SUCCESS,
              'jsonData'=>['BusinessTypeList'=>$businessType]]; */
            $jsonHandlerDto = new JsonHandlerDTO();
            $jsonHandlerDto->setMessage("Business Type List");
            $jsonHandlerDto->setResultHead('BusinessTypeList');
            $jsonHandlerDto->setIsSuccess(APICodes::$TRANSACTION_SUCCESS);
            $jsonHandlerDto->setResultInArr($businessType);
            return JsonHandler::getJsonMessage($jsonHandlerDto);
        } else {
            return AppDTO::$TRUE_AS_STRING;
        }
    }

    public function saveSalonWorkStyle(SalonDTO $salonDTO) {
        $salonMasterModel = new SalonMaster();
        $salonData = $salonMasterModel->getSalonDataById($salonDTO->getSalonId());

        if (!$salonData->isEmpty()) {
            $salonData = $salonMasterModel->saveSalonWorkStyle($salonDTO);
            if ($salonDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {
                //$response['Status'] = APICodes::$TRANSACTION_SUCCESS;
                //$response['Message'] = "Successfully Saved!";
                //$response['SalonData'] = $salonData; //salone data Object

                /* $response=[ 'Message'=>"Successfully Saved!",
                  'isSucces'=>APICodes::$TRANSACTION_SUCCESS,
                  'jsonData'=>['SaloneDetails'=>$salonData]]; */
                $jsonHandlerDto = new JsonHandlerDTO();
                $jsonHandlerDto->setMessage("Successfully Saved!");
                $jsonHandlerDto->setResultHead('SaloneDetails');
                $jsonHandlerDto->setIsSuccess(APICodes::$TRANSACTION_SUCCESS);
                $jsonHandlerDto->setResultInArr($salonData);
                return JsonHandler::getJsonMessage($jsonHandlerDto);
            } else {
                return AppDTO::$TRUE_AS_STRING;
            }
        } else {
            if ($salonDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {
                //$response['Status'] = APICodes::$TRANSACTION_DATA_NOT_FOUND;
                //$response['Message'] = "Salon '" .$salonDTO->getSalonId() . "' does not exist!" ;
                /* $response=[ 'Message'=>"Salon '" .$salonDTO->getSalonId() . "' does not exist!",
                  'isSucces'=>APICodes::$TRANSACTION_DATA_NOT_FOUND,
                  'jsonData'=>[]]; */
                $jsonHandlerDto = new JsonHandlerDTO();
                $jsonHandlerDto->setMessage("Salon '" . $salonDTO->getSalonId() . "' does not exist!");
                $jsonHandlerDto->setIsSuccess(APICodes::$TRANSACTION_DATA_NOT_FOUND);

                return JsonHandler::getJsonMessage($jsonHandlerDto);
            } else {
                return AppDTO::$TRUE_AS_STRING;
            }
        }
    }

    public function saveSalonServiceType(SalonDTO $salonDTO) {
        $salonMasterModel = new SalonMaster();
        $salonData = $salonMasterModel->getSalonDataById($salonDTO->getSalonId());

        if (!$salonData->isEmpty()) {
            $salonData = $salonMasterModel->saveSalonServiceType($salonDTO);
            if ($salonDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {
                //$response['Status'] = APICodes::$TRANSACTION_SUCCESS;
                //$response['Message'] = "Successfully Saved!";
                //$response['SalonData'] = $salonData; //salone data Object
                /* $response=[ 'Message'=>"Successfully Saved!",
                  'isSucces'=>APICodes::$TRANSACTION_SUCCESS,
                  'jsonData'=>['SaloneDetails'=>$salonData]]; */
                $jsonHandlerDto = new JsonHandlerDTO();
                $jsonHandlerDto->setMessage("Successfully Saved!");
                $jsonHandlerDto->setResultHead('SaloneDetails');
                $jsonHandlerDto->setIsSuccess(APICodes::$TRANSACTION_SUCCESS);
                $jsonHandlerDto->setResultInArr($salonData);
                return JsonHandler::getJsonMessage($jsonHandlerDto);
            } else {
                return AppDTO::$TRUE_AS_STRING;
            }
        } else {
            if ($salonDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {
                //$response['Status'] = APICodes::$TRANSACTION_DATA_NOT_FOUND;
                //$response['Message'] = "Salon '" .$salonDTO->getSalonId() . "' does not exist!" ;
                /*             $response=[ 'Message'=>"Salon '" .$salonDTO->getSalonId() . "' does not exist!",
                  'isSucces'=>APICodes::$TRANSACTION_DATA_NOT_FOUND,
                  'jsonData'=>[]]; */
                $jsonHandlerDto = new JsonHandlerDTO();
                $jsonHandlerDto->setMessage("Salon '" . $salonDTO->getSalonId() . "' does not exist!");
                $jsonHandlerDto->setIsSuccess(APICodes::$TRANSACTION_DATA_NOT_FOUND);
                return JsonHandler::getJsonMessage($jsonHandlerDto);
            } else {
                return AppDTO::$TRUE_AS_STRING;
            }
        }
    }

    public function saveSalonServiceGender(SalonDTO $salonDTO) {
        $salonMasterModel = new SalonMaster();
        $salonData = $salonMasterModel->getSalonDataById($salonDTO->getSalonId());

        if (!$salonData->isEmpty()) {
            $salonData = $salonMasterModel->saveSalonServiceGender($salonDTO);
            if ($salonDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {
                //$response['Status'] = APICodes::$TRANSACTION_SUCCESS;
                //$response['Message'] = "Successfully Saved!";
                //$response['SalonData'] = $salonData; //salone data Object

                /*  $response=[ 'Message'=>"Successfully Saved!",
                  'isSucces'=>APICodes::$TRANSACTION_SUCCESS,
                  'jsonData'=>['SaloneDetails'=>$salonData]]; */
                $jsonHandlerDto = new JsonHandlerDTO();
                $jsonHandlerDto->setMessage("Successfully Saved!");
                $jsonHandlerDto->setResultHead('SaloneDetails');
                $jsonHandlerDto->setIsSuccess(APICodes::$TRANSACTION_SUCCESS);
                $jsonHandlerDto->setResultInArr($salonData);
                return JsonHandler::getJsonMessage($jsonHandlerDto);
            } else {
                return AppDTO::$TRUE_AS_STRING;
            }
        } else {
            if ($salonDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {
                //$response['Status'] = APICodes::$TRANSACTION_DATA_NOT_FOUND;
                //$response['Message'] = "Salon '" .$salonDTO->getSalonId() . "' does not exist!" ;
                /* $response=[ 'Message'=>"Salon '" .$salonDTO->getSalonId() . "' does not exist!",
                  'isSucces'=>APICodes::$TRANSACTION_DATA_NOT_FOUND,
                  'jsonData'=>[]]; */
                $jsonHandlerDto = new JsonHandlerDTO();
                $jsonHandlerDto->setMessage("Salon '" . $salonDTO->getSalonId() . "' does not exist!");
                $jsonHandlerDto->setIsSuccess(APICodes::$TRANSACTION_DATA_NOT_FOUND);
                return JsonHandler::getJsonMessage($jsonHandlerDto);
            } else {
                return AppDTO::$TRUE_AS_STRING;
            }
        }
    }

    public function saveSalonWorkingDays(SalonDTO $salonDTO) {
        $salonMasterModel = new SalonMaster();
        $salonData = $salonMasterModel->getSalonDataById($salonDTO->getSalonId());

        if (!$salonData->isEmpty()) {
            $salonData = $salonMasterModel->saveSalonWorkingDays($salonDTO);
            if ($salonDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {
                //$response['Status'] = APICodes::$TRANSACTION_SUCCESS;
                //$response['Message'] = "Successfully Saved!";
                //$response['SalonData'] = $salonData; //salone data Object
                /* $response=[ 'Message'=>"Successfully Saved!",
                  'isSucces'=>APICodes::$TRANSACTION_SUCCESS,
                  'jsonData'=>['SaloneDetails'=>$salonData]]; */
                $jsonHandlerDto = new JsonHandlerDTO();
                $jsonHandlerDto->setMessage("Successfully Saved!");
                $jsonHandlerDto->setResultHead('SaloneDetails');
                $jsonHandlerDto->setIsSuccess(APICodes::$TRANSACTION_SUCCESS);
                $jsonHandlerDto->setResultInArr($salonData);
                return JsonHandler::getJsonMessage($jsonHandlerDto);
            } else {
                return AppDTO::$TRUE_AS_STRING;
            }
        } else {
            if ($salonDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {
                //$response['Status'] = APICodes::$TRANSACTION_DATA_NOT_FOUND;
                //$response['Message'] = "Salon '" .$salonDTO->getSalonId() . "' does not exist!" ;
                $jsonHandlerDto = new JsonHandlerDTO();
                $jsonHandlerDto->setMessage("Salon '" . $salonDTO->getSalonId() . "' does not exist!");
                $jsonHandlerDto->setIsSuccess(APICodes::$TRANSACTION_DATA_NOT_FOUND);
                return JsonHandler::getJsonMessage($jsonHandlerDto);
            } else {
                return AppDTO::$TRUE_AS_STRING;
            }
        }
    }

    public function lstSalonBranches(SalonBranchesDTO $salonBranchesDTO) {
        $salonMasterModel = new SalonMaster();
        $salonData = $salonMasterModel->getSalonDataById($salonBranchesDTO->getSalonId());

        if ($salonData->isEmpty()) {
            if ($salonBranchesDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {
                //$response['Status'] = APICodes::$TRANSACTION_DATA_NOT_FOUND;
                //$response['Message'] = "Salon '" .$salonBranchesDTO->getSalonId() . "' does not exist!" ;
                /* $response=[ 'Message'=>"Salon '" . $salonBranchesDTO->getSalonId()  . "' does not exist!",
                  'isSucces'=>APICodes::$TRANSACTION_DATA_NOT_FOUND,
                  'jsonData'=>[]]; */
                $jsonHandlerDto = new JsonHandlerDTO();
                $jsonHandlerDto->setMessage("Salon '" . $salonBranchesDTO->getSalonId() . "' does not exist!");
                $jsonHandlerDto->setIsSuccess(APICodes::$TRANSACTION_DATA_NOT_FOUND);
                return JsonHandler::getJsonMessage($jsonHandlerDto);
            } else {
                return AppDTO::$TRUE_AS_STRING;
            }
        }

        $salonBranchesModel = new SalonBranches();
        $salonBranches = $salonBranchesModel->getBranchDataDTO($salonBranchesDTO);

        if ($salonBranches) {
            if ($salonBranchesDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {
                //$response['Status'] = APICodes::$TRANSACTION_SUCCESS;
                //$response['Message'] = "Salon Branches List!";
                //$response['BrancheList'] = $salonBranches; //salone data Object
                /* $response=[ 'Message'=>"Salon Branches List!",
                  'isSucces'=>APICodes::$TRANSACTION_SUCCESS,
                  'jsonData'=>['BrancheList'=>$salonBranches]]; */
                $jsonHandlerDto = new JsonHandlerDTO();
                $jsonHandlerDto->setMessage("Salon Branches List!");
                $jsonHandlerDto->setResultHead('BrancheList');
                $jsonHandlerDto->setIsSuccess(APICodes::$TRANSACTION_SUCCESS);
                $jsonHandlerDto->setResultInArr($salonBranches);
                return JsonHandler::getJsonMessage($jsonHandlerDto);
            } else {
                return AppDTO::$TRUE_AS_STRING;
            }
        } else {
            if ($salonBranchesDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {
                //$response['Status'] = APICodes::$TRANSACTION_DATA_NOT_FOUND;
                //$response['Message'] = "Branch'" .$salonBranchesDTO->getBranchId() . "' does not exist!" ;
                $jsonHandlerDto = new JsonHandlerDTO();
                $jsonHandlerDto->setMessage("Branch'" . $salonBranchesDTO->getBranchId() . "' does not exist!");
                $jsonHandlerDto->setIsSuccess(APICodes::$TRANSACTION_DATA_NOT_FOUND);

                return JsonHandler::getJsonMessage($jsonHandlerDto);
            } else {
                return AppDTO::$TRUE_AS_STRING;
            }
        }
    }

    public function saveSalonBranches(SalonBranchesDTO $salonBranchesDTO) {
        $salonMasterModel = new SalonMaster();
        $salonData = $salonMasterModel->getSalonDataById($salonBranchesDTO->getSalonId());

        if (!$salonData->isEmpty()) {
            $salonbranchesModel = new SalonBranches();
            $branchData = $salonbranchesModel->SaveBrachData($salonBranchesDTO);
            if ($salonBranchesDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {
                //$response['Status'] = APICodes::$TRANSACTION_SUCCESS;
                //$response['Message'] = "Successfully Saved!";
                //$response['BranchData'] = $branchData; //salone data Object
                /* $response=[ 'Message'=>"Successfully Saved!",
                  'isSucces'=>APICodes::$TRANSACTION_SUCCESS,
                  'jsonData'=>['BranchData'=>$branchData]]; */
                $jsonHandlerDto = new JsonHandlerDTO();
                $jsonHandlerDto->setMessage("Successfully Saved!");
                $jsonHandlerDto->setResultHead('BranchData');
                $jsonHandlerDto->setIsSuccess(APICodes::$TRANSACTION_SUCCESS);
                $jsonHandlerDto->setResultInArr($branchData);
                return JsonHandler::getJsonMessage($jsonHandlerDto);
            } else {
                return AppDTO::$TRUE_AS_STRING;
            }
        } else {
            if ($salonBranchesDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {
                //$response['Status'] = APICodes::$TRANSACTION_DATA_NOT_FOUND;
                //$response['Message'] = "Salon '" .$salonBranchesDTO->getSalonId() . "' does not exist!" ;
                /* $response=[ 'Message'=>"Salon '" .$salonBranchesDTO->getSalonId() . "' does not exist!",
                  'isSucces'=>APICodes::$TRANSACTION_DATA_NOT_FOUND,
                  'jsonData'=>[]]; */
                $jsonHandlerDto = new JsonHandlerDTO();
                $jsonHandlerDto->setMessage("Salon '" . $salonBranchesDTO->getSalonId() . "' does not exist!");
                $jsonHandlerDto->setIsSuccess(APICodes::$TRANSACTION_DATA_NOT_FOUND);

                return JsonHandler::getJsonMessage($jsonHandlerDto);
            } else {
                return AppDTO::$TRUE_AS_STRING;
            }
        }
    }

    public function lstSalonEmployee(SalonEmployeeDTO $salonEmployeeDTO) {
        //checking salon 
        $salonMasterModel = new SalonMaster();
        $salonData = $salonMasterModel->getSalonDataById($salonEmployeeDTO->getSalonId());

        if ($salonData->isEmpty()) {
            if ($salonEmployeeDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {
                //$response['Status'] = APICodes::$TRANSACTION_DATA_NOT_FOUND;
                //$response['Message'] = "Salon '" .$salonEmployeeDTO->getSalonId() . "' does not exist!" ;
                /* $response=[ 'Message'=>"Salon '" .$salonEmployeeDTO->getSalonId() . "' does not exist!",
                  'isSucces'=>APICodes::$TRANSACTION_DATA_NOT_FOUND,
                  'jsonData'=>[]]; */
                $jsonHandlerDto = new JsonHandlerDTO();
                $jsonHandlerDto->setMessage("Salon '" . $salonEmployeeDTO->getSalonId() . "' does not exist!");
                $jsonHandlerDto->setIsSuccess(APICodes::$TRANSACTION_DATA_NOT_FOUND);

                return JsonHandler::getJsonMessage($jsonHandlerDto);
            } else {
                return AppDTO::$TRUE_AS_STRING;
            }
        }

        $salonEmployeeModel = new SalonEmployee();
        if ($salonEmployeeDTO->getEmployeehId() == "") {
            $employeeData = $salonEmployeeModel->getSalonEmployees($salonEmployeeDTO);
        } else {
            $employeeData = $salonEmployeeModel->getSalonEmployeebyId($salonEmployeeDTO);
        }
        if ($employeeData) {
            if ($salonEmployeeDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {
                //$response['Status'] = APICodes::$TRANSACTION_SUCCESS;
                //$response['Message'] = "Salon Employee List!";
                //$response['EmployeeList'] = $employeeData; //salone data Object
                /* $response=[ 'Message'=>"Salon Employee List!",
                  'isSucces'=>APICodes::$TRANSACTION_SUCCESS,
                  'jsonData'=>['EmployeeList'=>$employeeData]]; */
                $jsonHandlerDto = new JsonHandlerDTO();
                $jsonHandlerDto->setMessage("Salon Employee List!");
                $jsonHandlerDto->setResultHead('EmployeeList');
                $jsonHandlerDto->setIsSuccess(APICodes::$TRANSACTION_SUCCESS);
                $jsonHandlerDto->setResultInArr($employeeData);
                return JsonHandler::getJsonMessage($jsonHandlerDto);
            } else {
                return AppDTO::$TRUE_AS_STRING;
            }
        } else {
            if ($salonEmployeeDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {
                //$response['Status'] = APICodes::$TRANSACTION_DATA_NOT_FOUND;
                //$response['Message'] = "Employee '" .$salonEmployeeDTO->getEmployeehId() . "' does not exist!" ;
                /*              $response=[ 'Message'=>"Employee '" .$salonEmployeeDTO->getEmployeehId() . "' does not exist!",
                  'isSucces'=>APICodes::$TRANSACTION_DATA_NOT_FOUND,
                  'jsonData'=>[]]; */
                $jsonHandlerDto = new JsonHandlerDTO();
                $jsonHandlerDto->setMessage("Employee '" . $salonEmployeeDTO->getEmployeehId() . "' does not exist!");
                $jsonHandlerDto->setIsSuccess(APICodes::$TRANSACTION_SUCCESS);

                return JsonHandler::getJsonMessage($jsonHandlerDto);
            } else {
                return AppDTO::$TRUE_AS_STRING;
            }
        }
    }

    public function saveSalonEmployee(SalonEmployeeDTO $salonEmployeeDTO) {
        //checking salon 
        $salonMasterModel = new SalonMaster();
        $salonData = $salonMasterModel->getSalonDataById($salonEmployeeDTO->getSalonId());

        if ($salonData->isEmpty()) {
            if ($salonEmployeeDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {
                //$response['Status'] = APICodes::$TRANSACTION_DATA_NOT_FOUND;
                //$response['Message'] = "Salon '" .$salonEmployeeDTO->getSalonId() . "' does not exist!" ;
                /* $response=[ 'Message'=>"Salon '" .$salonEmployeeDTO->getSalonId() . "' does not exist!" ,
                  'isSucces'=>APICodes::$TRANSACTION_DATA_NOT_FOUND,
                  'jsonData'=>[]]; */
                $jsonHandlerDto = new JsonHandlerDTO();
                $jsonHandlerDto->setMessage("Salon '" . $salonEmployeeDTO->getSalonId() . "' does not exist!");

                $jsonHandlerDto->setIsSuccess(APICodes::$TRANSACTION_DATA_NOT_FOUND);

                return JsonHandler::getJsonMessage($jsonHandlerDto);
            } else {
                return AppDTO::$TRUE_AS_STRING;
            }
        }

        $salonEmployeeModel = new SalonEmployee();
        $employeeData = $salonEmployeeModel->getSalonEmployeebyPhoneNo($salonEmployeeDTO);
        if (!$employeeData) {
            $employeeData = $salonEmployeeModel->SaveSalonEmployee($salonEmployeeDTO);
            if ($employeeData) {
                //Sent OTP to employee
                $userOtpDTO = new UserOtpDTO();
                $userOtpDTO->setFullName($salonEmployeeDTO->getEmployeeName());
                $userOtpDTO->setPhoneNumber($salonEmployeeDTO->getEmployeePhoneNo());
                $userOtpDTO->setUserType("Employee");
                $bUserOtp = new BUserOtp();
                $otp = $bUserOtp->saveRegistrationOtp($userOtpDTO);

                if ($salonEmployeeDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {
                    //$response['Status'] = APICodes::$TRANSACTION_SUCCESS;
                    //$response['Message'] = "Successfully Saved!";
                    //$response['EmployDetails'] = $employeeData; //salone data Object
                    /* $response=[ 'Message'=>"Successfully Saved!",
                      'isSucces'=>APICodes::$TRANSACTION_SUCCESS,
                      'jsonData'=>['EmployeeDetails'=>$employeeData]]; */

                    $jsonHandlerDto = new JsonHandlerDTO();
                    $jsonHandlerDto->setMessage("Successfully Saved!");
                    $jsonHandlerDto->setResultHead('EmployeeDetails');
                    $jsonHandlerDto->setIsSuccess(APICodes::$TRANSACTION_SUCCESS);
                    $jsonHandlerDto->setResultInArr($employeeData);
                    return JsonHandler::getJsonMessage($jsonHandlerDto);
                } else {
                    return AppDTO::$TRUE_AS_STRING;
                }
            }
        } else {
            if ($salonEmployeeDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {
                //$response['Status'] = APICodes::$TRANSACTION_ALREADY_EXIST;
                //$response['Message'] = " Phone Number Already Exist! ";
                //$response['EmployDetails'] = $employeeData; //salone data Object
                /* $response=[ 'Message'=>"Phone Number Already Exist!",
                  'isSucces'=>APICodes::$TRANSACTION_ALREADY_EXIST,
                  'jsonData'=>['EmployeeDetails'=>$employeeData]]; */
                $jsonHandlerDto = new JsonHandlerDTO();
                $jsonHandlerDto->setMessage("Phone Number Already Exist!");
                $jsonHandlerDto->setResultHead('EmployeeDetails');
                $jsonHandlerDto->setIsSuccess(APICodes::$TRANSACTION_ALREADY_EXIST);
                $jsonHandlerDto->setResultInArr($employeeData[0]);
                return JsonHandler::getJsonMessage($jsonHandlerDto);
            } else {
                return AppDTO::$TRUE_AS_STRING;
            }
        }
    }

    public function updateSalonEmployee(SalonEmployeeDTO $salonEmployeeDTO) {
        //checking salon 
        $salonMasterModel = new SalonMaster();
        $salonData = $salonMasterModel->getSalonDataById($salonEmployeeDTO->getSalonId());

        if ($salonData->isEmpty()) {
            if ($salonEmployeeDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {
                //$response['Status'] = APICodes::$TRANSACTION_DATA_NOT_FOUND;
                //$response['Message'] = "Salon '" .$salonEmployeeDTO->getSalonId() . "' does not exist!" ;
                /*  $response=[ 'Message'=>"Salon '" .$salonEmployeeDTO->getSalonId() . "' does not exist!" ,
                  'isSucces'=>APICodes::$TRANSACTION_DATA_NOT_FOUND,
                  'jsonData'=>[]]; */
                $jsonHandlerDto = new JsonHandlerDTO();
                $jsonHandlerDto->setMessage("Salon '" . $salonEmployeeDTO->getSalonId() . "' does not exist!");
                $jsonHandlerDto->setIsSuccess(APICodes::$TRANSACTION_DATA_NOT_FOUND);

                return JsonHandler::getJsonMessage($jsonHandlerDto);
            } else {
                return AppDTO::$TRUE_AS_STRING;
            }
        }

        $salonEmployeeModel = new SalonEmployee();
        $employeeData = $salonEmployeeModel->getSalonEmployeebyId($salonEmployeeDTO);

        if ($employeeData) {
            $employeeData = $salonEmployeeModel->UpdateSalonEmployee($salonEmployeeDTO);
            if ($salonEmployeeDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {
                //$response['Status'] = APICodes::$TRANSACTION_SUCCESS;
                //$response['Message'] = "Successfully updated!";
                //$response['BranchData'] = $employeeData; //salone data Object
                /* $response=[ 'Message'=>"Successfully Saved!",
                  'isSucces'=>APICodes::$TRANSACTION_SUCCESS,
                  'jsonData'=>['EmployeeDetails'=>$employeeData]]; */
                $jsonHandlerDto = new JsonHandlerDTO();
                $jsonHandlerDto->setMessage("Successfully Saved!");
                $jsonHandlerDto->setResultHead('EmployeeDetails');
                $jsonHandlerDto->setIsSuccess(APICodes::$TRANSACTION_SUCCESS);
                $jsonHandlerDto->setResultInArr($employeeData);
                return JsonHandler::getJsonMessage($jsonHandlerDto);
            } else {
                return AppDTO::$TRUE_AS_STRING;
            }
        } else {
            if ($salonEmployeeDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {
                //$response['Status'] = APICodes::$TRANSACTION_DATA_NOT_FOUND;
                //$response['Message'] = "Employee does not exist! ";
                /* $response=[ 'Message'=>"Employee does not exist!",
                  'isSucces'=>APICodes::$TRANSACTION_DATA_NOT_FOUND,
                  'jsonData'=>[]]; */
                $jsonHandlerDto = new JsonHandlerDTO();
                $jsonHandlerDto->setMessage("Employee does not exist! ");

                $jsonHandlerDto->setIsSuccess(APICodes::$TRANSACTION_DATA_NOT_FOUND);

                return JsonHandler::getJsonMessage($jsonHandlerDto);
            } else {
                return AppDTO::$TRUE_AS_STRING;
            }
        }
    }

    public function lstBank() {
        $bankModel = new Bank();
        $bankDetails = $bankModel->listAll();
        $jsonHandlerDto = new JsonHandlerDTO();
        $jsonHandlerDto->setMessage("Success!");
        $jsonHandlerDto->setResultHead('BankList');
        $jsonHandlerDto->setIsSuccess(APICodes::$TRANSACTION_SUCCESS);
        $jsonHandlerDto->setResultInArr($bankDetails);
        return JsonHandler::getJsonMessage($jsonHandlerDto);
    }

    public function saveSalonCommercial(SalonDTO $salonDTO) {
        //checking salon 
        $salonMasterModel = new SalonMaster();
        $salonData = $salonMasterModel->getSalonDataById($salonDTO->getSalonId());

        if ($salonData->isEmpty()) {
            if ($salonDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {
                $jsonHandlerDto = new JsonHandlerDTO();
                $jsonHandlerDto->setMessage("Salon '" . $salonDTO->getSalonId() . "' does not exist!");
                $jsonHandlerDto->setIsSuccess(APICodes::$TRANSACTION_DATA_NOT_FOUND);

                return JsonHandler::getJsonMessage($jsonHandlerDto);
            } else {
                return AppDTO::$TRUE_AS_STRING;
            }
        }

        //Salon Commercial file 
        if ($salonDTO->getCommercailFile() != null && $salonDTO->getCommercailFile() != '') {
            $salonCommercial = $salonDTO->getCommercailFile();
            $salonCommercial_name = md5(Rand(1000, 10000));
            $salonCommercial_ext = strtolower($salonCommercial->getClientOriginalExtension());
            $salonCommercial_full_name = $salonCommercial_name . "." . $salonCommercial_ext;
            $salonCommercial_url = AppDTO::$salonCommercialPath . "." . $salonCommercial_full_name;
            $salonCommercial->move(AppDTO::$salonCommercialPath, $salonCommercial_full_name);
            $salonDTO->setCommercailFile($salonCommercial_full_name);
        }


        //Salon Tax file 
        if ($salonDTO->getTaxDocument() != null && $salonDTO->getTaxDocument() != '') {
            $salonTax = $salonDTO->getTaxDocument();
            $salonTax_name = md5(Rand(1000, 10000));
            $salonTax_ext = strtolower($salonTax->getClientOriginalExtension());
            $salonTax_full_name = $salonTax_name . "." . $salonTax_ext;
            $salonTax_url = AppDTO::$salonTaxPath . "." . $salonTax_full_name;
            $salonTax->move(AppDTO::$salonTaxPath, $salonTax_full_name);
            $salonDTO->setTaxDocument($salonTax_full_name);
        }


        //Salon IBAN file 
        if ($salonDTO->getIBANDocument() != null && $salonDTO->getIBANDocument() != '') {
            $salonIBAN = $salonDTO->getIBANDocument();
            $salonIBAN_name = md5(Rand(1000, 10000));
            $salonIBAN_ext = strtolower($salonIBAN->getClientOriginalExtension());
            $salonIBAN_full_name = $salonIBAN_name . "." . $salonIBAN_ext;
            $salonIBAN_url = AppDTO::$salonIBANPath . "." . $salonIBAN_full_name;
            $salonIBAN->move(AppDTO::$salonIBANPath, $salonIBAN_full_name);
            $salonDTO->setIBANDocument($salonIBAN_full_name);
        }

        $salonModel = new SalonMaster();
        $salonData = $salonModel->saveSalonCommercial($salonDTO);
        if ($salonDTO->getApiCall() == AppDTO::$TRUE_AS_STRING) {

            $jsonHandlerDto = new JsonHandlerDTO();
            $jsonHandlerDto->setMessage("Successfully Saved!");
            $jsonHandlerDto->setResultHead('SaloneDetails');
            $jsonHandlerDto->setIsSuccess(APICodes::$TRANSACTION_SUCCESS);
            $jsonHandlerDto->setResultInArr($salonData);
            return JsonHandler::getJsonMessage($jsonHandlerDto);
        } else {
            return AppDTO::$TRUE_AS_STRING;
        }
    }

}
