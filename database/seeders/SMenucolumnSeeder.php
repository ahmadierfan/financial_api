<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

use App\Models\s_menucolumn;

class SMenucolumnSeeder extends Seeder
{
    public function run(): void
    {
        $menuCulumns = [
            [
                "fk_menu" => 3,
                "columns" => [
                    [
                        "field" => "pk_reception",
                        "label" => "شناسه",
                        "labelsec" => "Id",
                        "ordernumber" => 1,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "receptiontype",
                        "label" => "نوع",
                        "labelsec" => "Type",
                        "ordernumber" => 2,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "customerfullname",
                        "label" => "مشتری",
                        "labelsec" => "Customer",
                        "ordernumber" => 3,
                        "isimage" => 0,
                    ],

                    [
                        "field" => "technicianfullname",
                        "label" => "تکنسین",
                        "labelsec" => "Technician",
                        "ordernumber" => 4,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "elementcategory",
                        "label" => "نوع دستگاه",
                        "labelsec" => "Category",
                        "ordernumber" => 5,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "issue",
                        "label" => "مشکل",
                        "labelsec" => "Issue",
                        "ordernumber" => 6,
                        "isimage" => 0,
                    ],

                    [
                        "field" => "jalalicreateddate",
                        "label" => "تاریخ ثبت",
                        "labelsec" => "Date",
                        "ordernumber" => 7,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "createdtime",
                        "label" => "ساعت ثبت",
                        "labelsec" => "Time",
                        "ordernumber" => 8,
                        "isimage" => 0,
                    ],
                    [
                        "fk_menu" => 3,
                        "field" => "receptionstatus",
                        "label" => "وضعیت",
                        "labelsec" => "Status",
                        "ordernumber" => 9,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "rejectreason",
                        "label" => "علت رد کردن",
                        "labelsec" => "reject Reason",
                        "ordernumber" => 10,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "visitdate",
                        "label" => "تاریخ جهت مراحعه",
                        "labelsec" => "Visit Date",
                        "ordernumber" => 11,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "visittime",
                        "label" => "ساعت جهت مراحعه",
                        "labelsec" => "Visit Time",
                        "ordernumber" => 12,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "issettledtext",
                        "label" => "مالی",
                        "labelsec" => "Accounting",
                        "ordernumber" => 13,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "registrarfullname",
                        "label" => "ثبت کننده",
                        "labelsec" => "Registrar",
                        "ordernumber" => 14,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "element",
                        "label" => "برند",
                        "labelsec" => "Element",
                        "ordernumber" => 15,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "subelement",
                        "label" => "مدل",
                        "labelsec" => "Sub Element",
                        "ordernumber" => 16,
                        "isimage" => 0,
                    ],
                ]
            ],
            [
                "fk_menu" => 127,
                "columns" => [
                    [
                        "field" => "pk_reception",
                        "label" => "شناسه",
                        "labelsec" => "Id",
                        "ordernumber" => 1,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "receptiontype",
                        "label" => "نوع",
                        "labelsec" => "Type",
                        "ordernumber" => 2,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "customerfullname",
                        "label" => "مشتری",
                        "labelsec" => "Customer",
                        "ordernumber" => 3,
                        "isimage" => 0,
                    ],

                    [
                        "field" => "technicianfullname",
                        "label" => "تکنسین",
                        "labelsec" => "Technician",
                        "ordernumber" => 4,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "elementcategory",
                        "label" => "نوع دستگاه",
                        "labelsec" => "Category",
                        "ordernumber" => 5,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "issue",
                        "label" => "مشکل",
                        "labelsec" => "Issue",
                        "ordernumber" => 6,
                        "isimage" => 0,
                    ],

                    [
                        "field" => "jalalicreateddate",
                        "label" => "تاریخ ثبت",
                        "labelsec" => "Date",
                        "ordernumber" => 7,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "createdtime",
                        "label" => "ساعت ثبت",
                        "labelsec" => "Time",
                        "ordernumber" => 8,
                        "isimage" => 0,
                    ],
                    [
                        "fk_menu" => 3,
                        "field" => "receptionstatus",
                        "label" => "وضعیت",
                        "labelsec" => "Status",
                        "ordernumber" => 9,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "rejectreason",
                        "label" => "علت رد کردن",
                        "labelsec" => "reject Reason",
                        "ordernumber" => 10,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "visitdate",
                        "label" => "تاریخ جهت مراحعه",
                        "labelsec" => "Visit Date",
                        "ordernumber" => 11,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "visittime",
                        "label" => "ساعت جهت مراحعه",
                        "labelsec" => "Visit Time",
                        "ordernumber" => 12,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "issettledtext",
                        "label" => "مالی",
                        "labelsec" => "Accounting",
                        "ordernumber" => 13,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "registrarfullname",
                        "label" => "ثبت کننده",
                        "labelsec" => "Registrar",
                        "ordernumber" => 14,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "element",
                        "label" => "برند",
                        "labelsec" => "Element",
                        "ordernumber" => 15,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "subelement",
                        "label" => "مدل",
                        "labelsec" => "Sub Element",
                        "ordernumber" => 16,
                        "isimage" => 0,
                    ],
                ]
            ],
            [
                "fk_menu" => 6,
                "columns" => [
                    [
                        "field" => "unit",
                        "label" => "نام واحد",
                        "labelsec" => "Unit",
                        "ordernumber" => 1,
                        "isimage" => 0,
                    ],

                    [
                        "field" => "registrarfullname",
                        "label" => "ثبت کننده",
                        "labelsec" => "Registrar",
                        "ordernumber" => 2,
                        "isimage" => 0,
                    ],


                ]
            ],
            [
                "fk_menu" => 9,
                "columns" => [
                    [
                        "field" => "bank",
                        "label" => "نام بانک",
                        "labelsec" => "Bank",
                        "ordernumber" => 1,
                        "isimage" => 0,
                    ],

                    [
                        "field" => "registrarfullname",
                        "label" => "ثبت کننده",
                        "labelsec" => "Registrar",
                        "ordernumber" => 2,
                        "isimage" => 0,
                    ],


                ]
            ],
            [
                "fk_menu" => 12,
                "columns" => [
                    [
                        "field" => "moneybox",
                        "label" => "نام صندوق",
                        "labelsec" => "MoneyboxName",
                        "ordernumber" => 1,
                        "isimage" => 0,
                    ],

                    [
                        "field" => "registrarfullname",
                        "label" => "ثبت کننده",
                        "labelsec" => "Registrar",
                        "ordernumber" => 2,
                        "isimage" => 0,
                    ],


                ]
            ],
            [
                "fk_menu" => 15,
                "columns" => [
                    [
                        "field" => "bank",
                        "label" => "نام بانک",
                        "labelsec" => "Bank Name",
                        "ordernumber" => 1,
                        "isimage" => 0,
                    ],

                    [
                        "field" => "bankaccount",
                        "label" => "نام حساب بانکی",
                        "labelsec" => "Bank Account Name",
                        "ordernumber" => 2,
                        "isimage" => 0,
                    ],

                    [
                        "field" => "cardnumber",
                        "label" => "شماره کارت",
                        "labelsec" => "Card Number",
                        "ordernumber" => 3,
                        "isimage" => 0,
                    ],

                    [
                        "field" => "accountnumber",
                        "label" => "شماره حساب",
                        "labelsec" => "Account Number",
                        "ordernumber" => 4,
                        "isimage" => 0,
                    ],

                    [
                        "field" => "bankaccountowner",
                        "label" => "مالک حساب",
                        "labelsec" => "Bank Account Owner",
                        "ordernumber" => 5,
                        "isimage" => 0,
                    ],

                    [
                        "field" => "iban",
                        "label" => "شبا",
                        "labelsec" => "Iban",
                        "ordernumber" => 6,
                        "isimage" => 0,
                    ],

                    [
                        "field" => "fk_accountingsub",
                        "label" => "زیر مجموعه حسابداری",
                        "labelsec" => "Accounting Sub",
                        "ordernumber" => 7,
                        "isimage" => 0,
                    ],


                    [
                        "field" => "registrarfullname",
                        "label" => "ثبت کننده",
                        "labelsec" => "Registrar",
                        "ordernumber" => 8,
                        "isimage" => 0,
                    ],


                ]
            ],
            [
                "fk_menu" => 18,
                "columns" => [
                    [
                        "field" => "userfullname",
                        "label" => "کاربر",
                        "labelsec" => "User",
                        "ordernumber" => 1,
                        "isimage" => 0,
                    ],

                    [
                        "field" => "warehouse",
                        "label" => "انبار",
                        "labelsec" => "Warehouse",
                        "ordernumber" => 2,
                        "isimage" => 0,
                    ],

                    [
                        "field" => "warehousesec",
                        "label" => "انبار",
                        "labelsec" => "Warehouse Sec",
                        "ordernumber" => 3,
                        "isimage" => 0,
                    ],

                    [
                        "field" => "warehousecode",
                        "label" => "کد انبار",
                        "labelsec" => "Warehouse Code",
                        "ordernumber" => 4,
                        "isimage" => 0,
                    ],

                    [
                        "field" => "phone",
                        "label" => "تلفن",
                        "labelsec" => "Phone",
                        "ordernumber" => 5,
                        "isimage" => 0,
                    ],

                    [
                        "field" => "address",
                        "label" => "آدرس",
                        "labelsec" => "Address",
                        "ordernumber" => 6,
                        "isimage" => 0,
                    ],

                    [
                        "field" => "fk_accountingsub",
                        "label" => "زیر مجموعه حسابداری",
                        "labelsec" => "Accounting Sub",
                        "ordernumber" => 7,
                        "isimage" => 0,
                    ],


                    [
                        "field" => "registrarfullname",
                        "label" => "ثبت کننده",
                        "labelsec" => "Registrar",
                        "ordernumber" => 8,
                        "isimage" => 0,
                    ],


                ]
            ],
            [
                "fk_menu" => 21,
                "columns" => [
                    [
                        "field" => "product",
                        "label" => "محصول",
                        "labelsec" => "Product",
                        "ordernumber" => 1,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "productcategory",
                        "label" => "دسته بندی",
                        "labelsec" => "Product Category",
                        "ordernumber" => 2,
                        "isimage" => 0,
                    ],

                    [
                        "field" => "unit",
                        "label" => "واحد",
                        "labelsec" => "Unit",
                        "ordernumber" => 10,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "registrarfullname",
                        "label" => "ثبت کننده",
                        "labelsec" => "Registrar",
                        "ordernumber" => 8,
                        "isimage" => 0,
                    ],

                    [
                        "field" => "productcode",
                        "label" => "کد",
                        "labelsec" => "Product Code",
                        "ordernumber" => 3,
                        "isimage" => 0,
                    ],

                    [
                        "field" => "barcode",
                        "label" => "بارکد",
                        "labelsec" => "Barcode",
                        "ordernumber" => 10,
                        "isimage" => 0,
                    ],

                    [
                        "field" => "conversionfactor",
                        "label" => "ضریب تبدیل",
                        "labelsec" => "Conversion Factor",
                        "ordernumber" => 11,
                        "isimage" => 0,
                    ],

                    [
                        "field" => "weight",
                        "label" => "وزن",
                        "labelsec" => "Weight",
                        "ordernumber" => 12,
                        "isimage" => 0,
                    ],

                    [
                        "field" => "height",
                        "label" => "ارتفاع",
                        "labelsec" => "Height",
                        "ordernumber" => 13,
                        "isimage" => 0,
                    ],

                    [
                        "field" => "width",
                        "label" => "عرض",
                        "labelsec" => "Width",
                        "ordernumber" => 14,
                        "isimage" => 0,
                    ],

                    [
                        "field" => "color",
                        "label" => "رنگ",
                        "labelsec" => "Color",
                        "ordernumber" => 15,
                        "isimage" => 0,
                    ],

                    [
                        "field" => "descriptions",
                        "label" => "توضیحات",
                        "labelsec" => "Descriptions",
                        "ordernumber" => 17,
                        "isimage" => 0,
                    ],

                    [
                        "field" => "property",
                        "label" => "ویژگی",
                        "labelsec" => "Property",
                        "ordernumber" => 18,
                        "isimage" => 0,
                    ],

                    [
                        "field" => "keywords",
                        "label" => "کلمات کلبدی",
                        "labelsec" => "Keywords",
                        "ordernumber" => 20,
                        "isimage" => 0,
                    ],

                    [
                        "field" => "saleprice",
                        "label" => "قیمت فروش",
                        "labelsec" => "Sale Price",
                        "ordernumber" => 21,
                        "isimage" => 0,
                    ],

                    [
                        "field" => "iscommingsoon",
                        "label" => "بزودی",
                        "labelsec" => "Comming Soon",
                        "ordernumber" => 22,
                        "isimage" => 0,
                    ],

                    [
                        "field" => "isavailable",
                        "label" => "در دسترس",
                        "labelsec" => "Is Available",
                        "ordernumber" => 23,
                        "isimage" => 0,
                    ],

                    [
                        "field" => "isforonlinesale",
                        "label" => "فروش آنلاین",
                        "labelsec" => "For Online Sale",
                        "ordernumber" => 24,
                    ]
                ]
            ],
            [
                "fk_menu" => 54,
                "columns" => [
                    [
                        "field" => "rejectreason",
                        "label" => "دلیل لغو",
                        "labelsec" => "Reject Reason",
                        "ordernumber" => 1,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "rejectstatus",
                        "label" => "نمایش در",
                        "labelsec" => "Reception Status",
                        "ordernumber" => 2,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "registrarfullname",
                        "label" => "ثبت کننده",
                        "labelsec" => "Registrar",
                        "ordernumber" => 3,
                        "isimage" => 0,
                    ],
                ]
            ],
            [
                "fk_menu" => 30,
                "columns" => [
                    [
                        "field" => "agency",
                        "label" => "شعبه",
                        "labelsec" => "Agency",
                        "ordernumber" => 1,
                        "isimage" => 0,
                    ],

                    [
                        "field" => "registrarfullname",
                        "label" => "ثبت کننده",
                        "labelsec" => "Registrar",
                        "ordernumber" => 2,
                        "isimage" => 0,
                    ],

                ]
            ],
            [
                "fk_menu" => 33,
                "columns" => [
                    [
                        "field" => "image",
                        "label" => "تصویر",
                        "labelsec" => "Image",
                        "ordernumber" => 2,
                        "isimage" => 1,
                    ],
                    [
                        "field" => "name",
                        "label" => "نام",
                        "labelsec" => "Name",
                        "ordernumber" => 2,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "lastname",
                        "label" => "نام خانوادگی",
                        "labelsec" => "Lastname",
                        "ordernumber" => 3,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "nationalcode",
                        "label" => "کد ملی",
                        "labelsec" => "National Code",
                        "ordernumber" => 4,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "mobile",
                        "label" => "موبایل",
                        "labelsec" => "Mobile",
                        "ordernumber" => 5,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "phone",
                        "label" => "تلفن",
                        "labelsec" => "Phone",
                        "ordernumber" => 6,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "isimported",
                        "label" => "ورود از اکسل",
                        "labelsec" => "Is Imported",
                        "ordernumber" => 7,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "registrarfullname",
                        "label" => "ثبت کننده",
                        "labelsec" => "Registrar",
                        "ordernumber" => 8,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "isactive",
                        "label" => "فعال",
                        "labelsec" => "Is Active",
                        "ordernumber" => 11,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "isblock",
                        "label" => "مسدود",
                        "labelsec" => "Is Blocked",
                        "ordernumber" => 9,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "isavailable",
                        "label" => "در دسترس",
                        "labelsec" => "Is Available",
                        "ordernumber" => 10,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "email",
                        "label" => "ایمیل",
                        "labelsec" => "Email",
                        "ordernumber" => 15,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "birthday",
                        "label" => "تاریخ تولد",
                        "labelsec" => "Birthday",
                        "ordernumber" => 14,
                        "isimage" => 0,
                    ],

                ]
            ],
            [
                "fk_menu" => 42,
                "columns" => [
                    [
                        "field" => "pk_reception",
                        "label" => "شناسه پذیرش",
                        "labelsec" => "ID",
                        "ordernumber" => 1,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "fk_invoice",
                        "label" => "شناسه فاکتور",
                        "labelsec" => "Invoice Id",
                        "ordernumber" => 3,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "technicianfullname",
                        "label" => "تکنسین",
                        "labelsec" => "Technician",
                        "ordernumber" => 4,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "customerfullname",
                        "label" => "مشتری",
                        "labelsec" => "Customer",
                        "ordernumber" => 5,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "jalalicreateddate",
                        "label" => "تاریخ",
                        "labelsec" => "Data",
                        "ordernumber" => 6,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "createdtime",
                        "label" => "ساعت",
                        "labelsec" => "Time",
                        "ordernumber" => 7,
                        "isimage" => 0,
                    ],

                    [
                        "field" => "registrarfullname",
                        "label" => "ثبت کننده",
                        "labelsec" => "Registrar",
                        "ordernumber" => 8,
                        "isimage" => 0,
                    ],
                ]
            ],
            [
                "fk_menu" => 51,
                "columns" => [
                    [
                        "field" => "pk_leaverequest",
                        "label" => "شناسه",
                        "labelsec" => "ID",
                        "ordernumber" => 1,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "userfullname",
                        "label" => "نام",
                        "labelsec" => "Name",
                        "ordernumber" => 2,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "jalalistartdate",
                        "label" => "شروع",
                        "labelsec" => "Name",
                        "ordernumber" => 2,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "jalalienddate",
                        "label" => "پایان",
                        "labelsec" => "Name",
                        "ordernumber" => 2,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "jalalistartdate",
                        "label" => "شروع",
                        "labelsec" => "Name",
                        "ordernumber" => 2,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "jalalicreateddate",
                        "label" => "تاریخ ثبت",
                        "labelsec" => "Name",
                        "ordernumber" => 2,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "registrarfullname",
                        "label" => "ثبت کننده",
                        "labelsec" => "Registrar",
                        "ordernumber" => 3,
                        "isimage" => 0,
                    ],
                ]
            ],
            [
                "fk_menu" => 28,
                "columns" => [
                    [
                        "field" => "pk_product",
                        "label" => "شناسه محصول",
                        "labelsec" => "Product Id",
                        "ordernumber" => 1,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "elementcategory",
                        "label" => "برای دستگاه",
                        "labelsec" => "For Device",
                        "ordernumber" => 2,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "product",
                        "label" => "محصول",
                        "labelsec" => "Product",
                        "ordernumber" => 3,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "productsec",
                        "label" => "نام در زبان دوم",
                        "labelsec" => "Name In Second",
                        "ordernumber" => 4,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "description",
                        "label" => "توضیحات",
                        "labelsec" => "Description",
                        "ordernumber" => 5,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "registrarfullname",
                        "label" => "ثبت کننده",
                        "labelsec" => "Registrar",
                        "ordernumber" => 6,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "isconfirmstatus",
                        "label" => "وضعیت",
                        "labelsec" => "Status",
                        "ordernumber" => 7,
                        "isimage" => 0,
                    ],

                ]
            ],
            [
                "fk_menu" => 72,
                "columns" => [
                    [
                        "field" => "pk_reception",
                        "label" => "شناسه پذیرش",
                        "labelsec" => "Reception ID",
                        "ordernumber" => 1,
                        "isimage" => 1,
                    ],
                    [
                        "field" => "technicianfullname",
                        "label" => "تکنسین",
                        "labelsec" => "Technician",
                        "ordernumber" => 2,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "customerfullname",
                        "label" => "مشتری",
                        "labelsec" => "Customer",
                        "ordernumber" => 3,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "address",
                        "label" => "آدرس",
                        "labelsec" => "Address",
                        "ordernumber" => 4,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "issue",
                        "label" => "مشکل",
                        "labelsec" => "Issue",
                        "ordernumber" => 5,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "mobile",
                        "label" => "موبایل مشتری",
                        "labelsec" => "Customer Mobile",
                        "ordernumber" => 6,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "customersubscriptionid",
                        "label" => "کد اشتراک",
                        "labelsec" => "Subscription ID",
                        "ordernumber" => 7,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "wage",
                        "label" => "اجرت",
                        "labelsec" => "Wage",
                        "ordernumber" => 8,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "invoicetotal",
                        "label" => "مبلغ",
                        "labelsec" => "Invoice Total",
                        "ordernumber" => 9,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "fk_receptiontype",
                        "label" => "نوع پذیرش",
                        "labelsec" => "Reception Type ID",
                        "ordernumber" => 10,
                        "isimage" => 0,
                    ],

                    [
                        "field" => "fk_receptionstatus",
                        "label" => "وضعیت پذیرش",
                        "labelsec" => "Reception Status ID",
                        "ordernumber" => 10,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "fk_elementcategory",
                        "label" => "دسته‌بندی قطعه",
                        "labelsec" => "Element Category ID",
                        "ordernumber" => 11,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "fk_element",
                        "label" => "کد قطعه",
                        "labelsec" => "Element ID",
                        "ordernumber" => 12,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "fk_subelement",
                        "label" => "کد زیرقطعه",
                        "labelsec" => "Subelement ID",
                        "ordernumber" => 13,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "receptiondate",
                        "label" => "تاریخ پذیرش",
                        "labelsec" => "Reception Date",
                        "ordernumber" => 14,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "receptiontime",
                        "label" => "ساعت پذیرش",
                        "labelsec" => "Reception Time",
                        "ordernumber" => 15,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "receptiontype",
                        "label" => "نوع پذیرش",
                        "labelsec" => "Reception Type",
                        "ordernumber" => 16,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "receptionstatus",
                        "label" => "وضعیت پذیرش",
                        "labelsec" => "Reception Status",
                        "ordernumber" => 17,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "elementcategory",
                        "label" => "دسته قطعه",
                        "labelsec" => "Element Category",
                        "ordernumber" => 18,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "element",
                        "label" => "قطعه",
                        "labelsec" => "Element",
                        "ordernumber" => 19,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "subelement",
                        "label" => "زیرقطعه",
                        "labelsec" => "Subelement",
                        "ordernumber" => 20,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "startdate",
                        "label" => "تاریخ شروع گارانتی",
                        "labelsec" => "Warranty Start",
                        "ordernumber" => 21,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "enddate",
                        "label" => "تاریخ پایان گارانتی",
                        "labelsec" => "Warranty End",
                        "ordernumber" => 22,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "technicianmobile",
                        "label" => "موبایل تکنسین",
                        "labelsec" => "Technician Mobile",
                        "ordernumber" => 23,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "technicianname",
                        "label" => "نام تکنسین",
                        "labelsec" => "Technician Name",
                        "ordernumber" => 24,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "technicianlastname",
                        "label" => "نام‌خانوادگی تکنسین",
                        "labelsec" => "Technician Lastname",
                        "ordernumber" => 25,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "fk_city",
                        "label" => "شهر",
                        "labelsec" => "City",
                        "ordernumber" => 26,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "fk_zone",
                        "label" => "منطقه",
                        "labelsec" => "Zone",
                        "ordernumber" => 27,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "pk_invoice",
                        "label" => "شناسه فاکتور",
                        "labelsec" => "Invoice ID",
                        "ordernumber" => 28,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "invoicecode",
                        "label" => "کد فاکتور",
                        "labelsec" => "Invoice Code",
                        "ordernumber" => 29,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "invoicedate",
                        "label" => "تاریخ فاکتور",
                        "labelsec" => "Invoice Date",
                        "ordernumber" => 30,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "fk_product",
                        "label" => "کد قطعه",
                        "labelsec" => "Product ID",
                        "ordernumber" => 31,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "product",
                        "label" => "نام قطعه",
                        "labelsec" => "Product",
                        "ordernumber" => 32,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "customercompany",
                        "label" => "کد شرکت",
                        "labelsec" => "Company Code",
                        "ordernumber" => 33,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "customername",
                        "label" => "نام مشتری",
                        "labelsec" => "Customer Name",
                        "ordernumber" => 34,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "customerphone",
                        "label" => "تلفن مشتری",
                        "labelsec" => "Customer Phone",
                        "ordernumber" => 47,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "customerid",
                        "label" => "شناسه مشتری",
                        "labelsec" => "Customer ID",
                        "ordernumber" => 1,
                        "isimage" => 48,
                    ],
                    [
                        "field" => "customeremail",
                        "label" => "ایمیل مشتری",
                        "labelsec" => "Customer Email",
                        "ordernumber" => 49,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "customernationalcode",
                        "label" => "کد ملی",
                        "labelsec" => "National Code",
                        "ordernumber" => 50,
                        "isimage" => 0,
                    ],
                ]
            ],
            [
                "fk_menu" => 48,
                "columns" => [
                    [
                        "field" => "userfullname",
                        "label" => "کاربر",
                        "labelsec" => "User",
                        "ordernumber" => 1,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "wallettransactiontype",
                        "label" => "نوع",
                        "labelsec" => "Type",
                        "ordernumber" => 2,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "amount",
                        "label" => "مبلغ-ریال",
                        "labelsec" => "Amount",
                        "ordernumber" => 3,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "fk_reception",
                        "label" => "شناسه پذیرش",
                        "labelsec" => "Recepytion ID",
                        "ordernumber" => 4,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "jalalicreateddate",
                        "label" => "تاریخ",
                        "labelsec" => "Date",
                        "ordernumber" => 5,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "createdtime",
                        "label" => "ساعت",
                        "labelsec" => "Time",
                        "ordernumber" => 6,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "ispaytext",
                        "label" => "وضعیت",
                        "labelsec" => "Status",
                        "ordernumber" => 7,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "description",
                        "label" => "توضیحات",
                        "labelsec" => "Amount",
                        "ordernumber" => 8,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "registrarfullname",
                        "label" => "ثبت کننده",
                        "labelsec" => "Registrar",
                        "ordernumber" => 9,
                        "isimage" => 0,
                    ],

                ]
            ],
            [
                "fk_menu" => 74,
                "columns" => [
                    [
                        "field" => "userfullname",
                        "label" => "کاربر",
                        "labelsec" => "User",
                        "ordernumber" => 1,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "amount",
                        "label" => "مانده",
                        "labelsec" => "Amount",
                        "ordernumber" => 1,
                        "isimage" => 0,
                    ],
                ]
            ],
            [
                "fk_menu" => 77,
                "columns" => [
                    [
                        "field" => "image",
                        "label" => "تصویر کاربر",
                        "labelsec" => "Image",
                        "ordernumber" => 2,
                        "isimage" => 1,
                    ],
                    [
                        "field" => "name",
                        "label" => "نام",
                        "labelsec" => "Name",
                        "ordernumber" => 2,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "lastname",
                        "label" => "نام خانوادگی",
                        "labelsec" => "Lastname",
                        "ordernumber" => 3,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "nationalcode",
                        "label" => "کد ملی",
                        "labelsec" => "National Code",
                        "ordernumber" => 4,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "birthday",
                        "label" => "تاریخ تولد",
                        "labelsec" => "Birthday",
                        "ordernumber" => 11,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "mobile",
                        "label" => "موبایل",
                        "labelsec" => "Mobile",
                        "ordernumber" => 6,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "phone",
                        "label" => "تلفن",
                        "labelsec" => "Phone",
                        "ordernumber" => 7,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "email",
                        "label" => "ایمیل",
                        "labelsec" => "Email",
                        "ordernumber" => 8,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "isactive",
                        "label" => "فعال",
                        "labelsec" => "Is Active",
                        "ordernumber" => 10,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "isblock",
                        "label" => "مسدود",
                        "labelsec" => "Is Blocked",
                        "ordernumber" => 11,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "isavailable",
                        "label" => "در دسترس",
                        "labelsec" => "Is Available",
                        "ordernumber" => 12,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "registrarfullname",
                        "label" => "ثبت کننده",
                        "labelsec" => "Registrar",
                        "ordernumber" => 13,
                        "isimage" => 0,
                    ],

                ]
            ],
            [
                "fk_menu" => 71,
                "columns" => [
                    [
                        "field" => "name",
                        "label" => "نام",
                        "labelsec" => "Name",
                        "ordernumber" => 2,
                        "isimage" => 0,
                    ],

                    [
                        "field" => "lastname",
                        "label" => "نام خانوادگی",
                        "labelsec" => "Lastname",
                        "ordernumber" => 3,
                        "isimage" => 0,
                    ],

                    [
                        "field" => "nationalcode",
                        "label" => "کد ملی",
                        "labelsec" => "National Code",
                        "ordernumber" => 4,
                        "isimage" => 0,
                    ],

                    [
                        "field" => "birthday",
                        "label" => "تاریخ تولد",
                        "labelsec" => "Birthday",
                        "ordernumber" => 11,
                        "isimage" => 0,
                    ],

                    [
                        "field" => "mobile",
                        "label" => "موبایل",
                        "labelsec" => "Mobile",
                        "ordernumber" => 6,
                        "isimage" => 0,
                    ],

                    [
                        "field" => "phone",
                        "label" => "تلفن",
                        "labelsec" => "Phone",
                        "ordernumber" => 7,
                        "isimage" => 0,
                    ],

                    [
                        "field" => "email",
                        "label" => "ایمیل",
                        "labelsec" => "Email",
                        "ordernumber" => 8,
                        "isimage" => 0,
                    ],

                    [
                        "field" => "registrarfullname",
                        "label" => "ثبت کننده",
                        "labelsec" => "Registrar",
                        "ordernumber" => 9,
                        "isimage" => 0,
                    ],

                ]
            ],
            [
                "fk_menu" => 34,
                "columns" => [
                    [
                        "field" => "name",
                        "label" => "نام",
                        "labelsec" => "Name",
                        "ordernumber" => 2,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "lastname",
                        "label" => "نام خانوادگی",
                        "labelsec" => "Lastname",
                        "ordernumber" => 3,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "nationalcode",
                        "label" => "کد ملی",
                        "labelsec" => "National Code",
                        "ordernumber" => 4,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "birthday",
                        "label" => "تاریخ تولد",
                        "labelsec" => "Birthday",
                        "ordernumber" => 5,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "mobile",
                        "label" => "موبایل",
                        "labelsec" => "Mobile",
                        "ordernumber" => 6,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "phone",
                        "label" => "تلفن",
                        "labelsec" => "Phone",
                        "ordernumber" => 7,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "email",
                        "label" => "ایمیل",
                        "labelsec" => "Email",
                        "ordernumber" => 8,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "registrarfullname",
                        "label" => "ثبت کننده",
                        "labelsec" => "Registrar",
                        "ordernumber" => 9,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "province",
                        "label" => "استان",
                        "labelsec" => "Province",
                        "ordernumber" => 10,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "city",
                        "label" => "شهر",
                        "labelsec" => "City",
                        "ordernumber" => 11,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "birthplace",
                        "label" => "محل تولد",
                        "labelsec" => "Birthplace",
                        "ordernumber" => 12,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "address",
                        "label" => "نشانی",
                        "labelsec" => "Address",
                        "ordernumber" => 13,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "description",
                        "label" => "توضیحات",
                        "labelsec" => "Description",
                        "ordernumber" => 14,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "expertise",
                        "label" => "تخصص",
                        "labelsec" => "Expertise",
                        "ordernumber" => 15,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "experience",
                        "label" => "سابقه کاری",
                        "labelsec" => "Experience",
                        "ordernumber" => 16,
                        "isimage" => 0,
                    ]
                ]
            ],
            [
                "fk_menu" => 52,
                "columns" => [
                    [
                        "field" => "pk_reception",
                        "label" => "شناسه پذیرش",
                        "labelsec" => "Reception Id",
                        "ordernumber" => 1,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "questiontext",
                        "label" => "پرسش",
                        "labelsec" => "Question",
                        "ordernumber" => 2,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "answertext",
                        "label" => "پاسخ",
                        "labelsec" => "Answer",
                        "ordernumber" => 3,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "technicianfullname",
                        "label" => "تکنسین",
                        "labelsec" => "Technician",
                        "ordernumber" => 4,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "customerfullname",
                        "label" => "مشتری",
                        "labelsec" => "Customer",
                        "ordernumber" => 5,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "jalalicreateddate",
                        "label" => "تاریخ",
                        "labelsec" => "Date",
                        "ordernumber" => 5,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "createdtime",
                        "label" => "ساعت",
                        "labelsec" => "Time",
                        "ordernumber" => 5,
                        "isimage" => 0,
                    ],
                ]
            ],
            [
                "fk_menu" => 45,
                "columns" => [
                    [
                        "field" => "pk_ticket",
                        "label" => "شناسه تیکت",
                        "labelsec" => "ID",
                        "ordernumber" => 1,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "registrarfullname",
                        "label" => "ثبت کننده",
                        "labelsec" => "Registrar",
                        "ordernumber" => 1,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "technicianfullname",
                        "label" => "تکنسین",
                        "labelsec" => "Technician",
                        "ordernumber" => 1,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "operatorfullname",
                        "label" => "اپراتور",
                        "labelsec" => "Operator",
                        "ordernumber" => 1,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "jalalicreateddate",
                        "label" => "تاریخ",
                        "labelsec" => "ID",
                        "ordernumber" => 1,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "createdtime",
                        "label" => "ساعت",
                        "labelsec" => "ID",
                        "ordernumber" => 1,
                        "isimage" => 0,
                    ],
                ]
            ],
            [
                "fk_menu" => 63,
                "columns" => [
                    [
                        "field" => "pk_role",
                        "label" => "شناسه نقش",
                        "labelsec" => "ID",
                        "ordernumber" => 1,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "role",
                        "label" => "نقش",
                        "labelsec" => "Role",
                        "ordernumber" => 2,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "registrarfullname",
                        "label" => "ثبت کننده",
                        "labelsec" => "Registrar",
                        "ordernumber" => 3,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "jalalicreateddate",
                        "label" => "تاریخ",
                        "labelsec" => "Created Date",
                        "ordernumber" => 4,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "jalalicreateddate",
                        "label" => "ساعت",
                        "labelsec" => "Created Date",
                        "ordernumber" => 5,
                        "isimage" => 0,
                    ],
                ]
            ],
            [
                "fk_menu" => 60,
                "columns" => [
                    [
                        "field" => "image",
                        "label" => "تصویر کاربر",
                        "labelsec" => "Image",
                        "ordernumber" => 2,
                        "isimage" => 1,
                    ],

                    [
                        "field" => "name",
                        "label" => "نام",
                        "labelsec" => "Name",
                        "ordernumber" => 2,
                        "isimage" => 0,
                    ],

                    [
                        "field" => "lastname",
                        "label" => "نام خانوادگی",
                        "labelsec" => "Lastname",
                        "ordernumber" => 3,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "nationalcode",
                        "label" => "کد ملی",
                        "labelsec" => "National Code",
                        "ordernumber" => 4,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "mobile",
                        "label" => "موبایل",
                        "labelsec" => "Mobile",
                        "ordernumber" => 6,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "email",
                        "label" => "ایمیل",
                        "labelsec" => "Email",
                        "ordernumber" => 8,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "registrarfullname",
                        "label" => "ثبت کننده",
                        "labelsec" => "Registrar",
                        "ordernumber" => 13,
                        "isimage" => 0,
                    ],

                ]
            ],

            [
                "fk_menu" => 83,
                "columns" => [
                    [
                        "field" => "pk_reception",
                        "label" => "شناسه",
                        "labelsec" => "Id",
                        "ordernumber" => 1,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "receptiontype",
                        "label" => "نوع",
                        "labelsec" => "Type",
                        "ordernumber" => 2,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "customerfullname",
                        "label" => "مشتری",
                        "labelsec" => "Customer",
                        "ordernumber" => 3,
                        "isimage" => 0,
                    ],

                    [
                        "field" => "technicianfullname",
                        "label" => "تکنسین",
                        "labelsec" => "Technician",
                        "ordernumber" => 4,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "elementcategory",
                        "label" => "نوع دستگاه",
                        "labelsec" => "Category",
                        "ordernumber" => 5,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "issue",
                        "label" => "مشکل",
                        "labelsec" => "Issue",
                        "ordernumber" => 6,
                        "isimage" => 0,
                    ],

                    [
                        "field" => "jalalicreateddate",
                        "label" => "تاریخ ثبت",
                        "labelsec" => "Date",
                        "ordernumber" => 7,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "createdtime",
                        "label" => "ساعت ثبت",
                        "labelsec" => "Time",
                        "ordernumber" => 8,
                        "isimage" => 0,
                    ],
                    [
                        "fk_menu" => 3,
                        "field" => "receptionstatus",
                        "label" => "وضعیت",
                        "labelsec" => "Status",
                        "ordernumber" => 9,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "rejectreason",
                        "label" => "علت رد کردن",
                        "labelsec" => "reject Reason",
                        "ordernumber" => 10,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "visitdate",
                        "label" => "تاریخ جهت مراحعه",
                        "labelsec" => "Visit Date",
                        "ordernumber" => 11,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "visittime",
                        "label" => "ساعت جهت مراحعه",
                        "labelsec" => "Visit Time",
                        "ordernumber" => 12,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "issettledtext",
                        "label" => "مالی",
                        "labelsec" => "Accounting",
                        "ordernumber" => 13,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "registrarfullname",
                        "label" => "ثبت کننده",
                        "labelsec" => "Registrar",
                        "ordernumber" => 14,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "element",
                        "label" => "برند",
                        "labelsec" => "Element",
                        "ordernumber" => 15,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "subelement",
                        "label" => "مدل",
                        "labelsec" => "Sub Element",
                        "ordernumber" => 16,
                        "isimage" => 0,
                    ],
                ]
            ],

            [
                "fk_menu" => 82,
                "columns" => [
                    [
                        "field" => "pk_reception",
                        "label" => "شناسه",
                        "labelsec" => "Id",
                        "ordernumber" => 1,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "receptiontype",
                        "label" => "نوع",
                        "labelsec" => "Type",
                        "ordernumber" => 2,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "customerfullname",
                        "label" => "مشتری",
                        "labelsec" => "Customer",
                        "ordernumber" => 3,
                        "isimage" => 0,
                    ],

                    [
                        "field" => "technicianfullname",
                        "label" => "تکنسین",
                        "labelsec" => "Technician",
                        "ordernumber" => 4,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "elementcategory",
                        "label" => "نوع دستگاه",
                        "labelsec" => "Category",
                        "ordernumber" => 5,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "issue",
                        "label" => "مشکل",
                        "labelsec" => "Issue",
                        "ordernumber" => 6,
                        "isimage" => 0,
                    ],

                    [
                        "field" => "jalalicreateddate",
                        "label" => "تاریخ ثبت",
                        "labelsec" => "Date",
                        "ordernumber" => 7,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "createdtime",
                        "label" => "ساعت ثبت",
                        "labelsec" => "Time",
                        "ordernumber" => 8,
                        "isimage" => 0,
                    ],
                    [
                        "fk_menu" => 3,
                        "field" => "receptionstatus",
                        "label" => "وضعیت",
                        "labelsec" => "Status",
                        "ordernumber" => 9,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "rejectreason",
                        "label" => "علت رد کردن",
                        "labelsec" => "reject Reason",
                        "ordernumber" => 10,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "visitdate",
                        "label" => "تاریخ جهت مراحعه",
                        "labelsec" => "Visit Date",
                        "ordernumber" => 11,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "visittime",
                        "label" => "ساعت جهت مراحعه",
                        "labelsec" => "Visit Time",
                        "ordernumber" => 12,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "issettledtext",
                        "label" => "مالی",
                        "labelsec" => "Accounting",
                        "ordernumber" => 13,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "registrarfullname",
                        "label" => "ثبت کننده",
                        "labelsec" => "Registrar",
                        "ordernumber" => 14,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "element",
                        "label" => "برند",
                        "labelsec" => "Element",
                        "ordernumber" => 15,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "subelement",
                        "label" => "مدل",
                        "labelsec" => "Sub Element",
                        "ordernumber" => 16,
                        "isimage" => 0,
                    ],
                ]
            ],
            [
                "fk_menu" => 85,
                "columns" => [
                    [
                        "field" => "pk_productcategory",
                        "label" => "شناسه",
                        "labelsec" => "Id",
                        "ordernumber" => 1,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "productcategory",
                        "label" => "دسته بندی محصول",
                        "labelsec" => "Product Category",
                        "ordernumber" => 1,
                        "isimage" => 0,
                    ],
                ]
            ],

            [
                "fk_menu" => 110,
                "columns" => [
                    [
                        "field" => "pk_invoice",
                        "label" => "شناسه",
                        "labelsec" => "Id",
                        "ordernumber" => 1,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "invoicetitle",
                        "label" => "عنوان فاکتور",
                        "labelsec" => "Product Category",
                        "ordernumber" => 1,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "userfullname",
                        "label" => "مشتری",
                        "labelsec" => "Customer",
                        "ordernumber" => 14,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "jalaliinvoicedocdate",
                        "label" => "تاریخ",
                        "labelsec" => "Invoice Date",
                        "ordernumber" => 14,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "invoicecode",
                        "label" => "کد فاکتور",
                        "labelsec" => "Invoice Code",
                        "ordernumber" => 1,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "registrarfullname",
                        "label" => "ثبت کننده",
                        "labelsec" => "Registrar",
                        "ordernumber" => 14,
                        "isimage" => 0,
                    ],
                ]
            ],
            [
                "fk_menu" => 107,
                "columns" => [
                    [
                        "field" => "pk_invoice",
                        "label" => "شناسه",
                        "labelsec" => "Id",
                        "ordernumber" => 1,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "invoicetitle",
                        "label" => "عنوان فاکتور",
                        "labelsec" => "Product Category",
                        "ordernumber" => 1,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "userfullname",
                        "label" => "مشتری",
                        "labelsec" => "Customer",
                        "ordernumber" => 14,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "jalaliinvoicedocdate",
                        "label" => "تاریخ",
                        "labelsec" => "Invoice Date",
                        "ordernumber" => 14,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "invoicecode",
                        "label" => "کد فاکتور",
                        "labelsec" => "Invoice Code",
                        "ordernumber" => 1,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "registrarfullname",
                        "label" => "ثبت کننده",
                        "labelsec" => "Registrar",
                        "ordernumber" => 14,
                        "isimage" => 0,
                    ],
                ]
            ],
            [
                "fk_menu" => 113,
                "columns" => [
                    [
                        "field" => "pk_invoice",
                        "label" => "شناسه",
                        "labelsec" => "Id",
                        "ordernumber" => 1,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "invoicetitle",
                        "label" => "عنوان فاکتور",
                        "labelsec" => "Product Category",
                        "ordernumber" => 1,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "userfullname",
                        "label" => "مشتری",
                        "labelsec" => "Customer",
                        "ordernumber" => 14,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "jalaliinvoicedocdate",
                        "label" => "تاریخ",
                        "labelsec" => "Invoice Date",
                        "ordernumber" => 14,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "invoicecode",
                        "label" => "کد فاکتور",
                        "labelsec" => "Invoice Code",
                        "ordernumber" => 1,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "registrarfullname",
                        "label" => "ثبت کننده",
                        "labelsec" => "Registrar",
                        "ordernumber" => 14,
                        "isimage" => 0,
                    ],
                ]
            ],
            [
                "fk_menu" => 68,
                "columns" => [
                    [
                        "field" => "pk_smsmessage",
                        "label" => "شناسه",
                        "labelsec" => "Id",
                        "ordernumber" => 1,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "sendedto",
                        "label" => "موبایل",
                        "labelsec" => "mobile",
                        "ordernumber" => 2,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "smstext",
                        "label" => "متن",
                        "labelsec" => "Text",
                        "ordernumber" => 3,
                        "isimage" => 0,
                    ],

                    [
                        "field" => "jalalicreateddate",
                        "label" => "زمان",
                        "labelsec" => "Date",
                        "ordernumber" => 4,
                        "isimage" => 0,
                    ],

                    [
                        "field" => "createdtime",
                        "label" => "ساعت",
                        "labelsec" => "Time",
                        "ordernumber" => 5,
                        "isimage" => 0,
                    ],
                ]
            ],
            [
                "fk_menu" => 129,
                "columns" => [
                    [
                        "field" => "pk_smspattern",
                        "label" => "شناسه",
                        "labelsec" => "Id",
                        "ordernumber" => 1,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "subject",
                        "label" => "موضوع",
                        "labelsec" => "Subject",
                        "ordernumber" => 2,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "smstext",
                        "label" => "متن",
                        "labelsec" => "Sms Text",
                        "ordernumber" => 3,
                        "isimage" => 0,
                    ],
                ]
            ],
            [
                "fk_menu" => 130,
                "columns" => [
                    [
                        "field" => "pk_userlogin",
                        "label" => "شناسه",
                        "labelsec" => "Id",
                        "ordernumber" => 1,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "userfullname",
                        "label" => "کاربر",
                        "labelsec" => "User Fullname",
                        "ordernumber" => 2,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "jalalicreateddate",
                        "label" => "تاریخ",
                        "labelsec" => "Create Date",
                        "ordernumber" => 3,
                        "isimage" => 0,
                    ],

                    [
                        "field" => "createdtime",
                        "label" => "ساعت",
                        "labelsec" => "Create Time",
                        "ordernumber" => 4,
                        "isimage" => 0,
                    ],
                ]
            ],
            [
                "fk_menu" => 133,
                "columns" => [
                    [
                        "field" => "pk_aiconversation",
                        "label" => "شناسه",
                        "labelsec" => "Id",
                        "ordernumber" => 1,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "message",
                        "label" => "پیام",
                        "labelsec" => "Id",
                        "ordernumber" => 2,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "jalalicreateddate",
                        "label" => "تاریخ",
                        "labelsec" => "Date",
                        "ordernumber" => 3,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "createdtime",
                        "label" => "ساعت",
                        "labelsec" => "Time",
                        "ordernumber" => 4,
                        "isimage" => 0,
                    ],
                ]
            ],
            [
                "fk_menu" => 139,
                "columns" => [
                    [
                        "field" => "pk_activity",
                        "label" => "شناسه",
                        "labelsec" => "Id",
                        "ordernumber" => 1,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "registrarfullname",
                        "label" => "ثبت کننده",
                        "labelsec" => "Id",
                        "ordernumber" => 2,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "activitytype",
                        "label" => "نوع",
                        "labelsec" => "Id",
                        "ordernumber" => 3,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "activityoutcome",
                        "label" => "وضعیت",
                        "labelsec" => "Id",
                        "ordernumber" => 4,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "scheduled",
                        "label" => "پیگیری",
                        "labelsec" => "Id",
                        "ordernumber" => 5,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "description",
                        "label" => "توضیحات",
                        "labelsec" => "Id",
                        "ordernumber" => 6,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "jalalicreateddate",
                        "label" => "تاریخ ثبت",
                        "labelsec" => "Id",
                        "ordernumber" => 7,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "time",
                        "label" => "ساعت ثبت",
                        "labelsec" => "Id",
                        "ordernumber" => 8,
                        "isimage" => 0,
                    ],
                ],
            ],
            [
                "fk_menu" => 141,
                "columns" => [
                    [
                        "field" => "pk_techniciansettle",
                        "label" => "شناسه",
                        "labelsec" => "ID",
                        "ordernumber" => 2,
                        "isimage" => 1,
                    ],
                    [
                        "field" => "name",
                        "label" => "نام",
                        "labelsec" => "Name",
                        "ordernumber" => 2,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "lastname",
                        "label" => "نام خانوادگی",
                        "labelsec" => "Lastname",
                        "ordernumber" => 3,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "mobile",
                        "label" => "موبایل",
                        "labelsec" => "Mobile",
                        "ordernumber" => 5,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "jalalicreateddate",
                        "label" => "تاریخ",
                        "labelsec" => "Date",
                        "ordernumber" => 5,
                        "isimage" => 0,
                    ],

                    [
                        "field" => "createdtime",
                        "label" => "ساعت",
                        "labelsec" => "Time",
                        "ordernumber" => 6,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "topay",
                        "label" => "مبلغ",
                        "labelsec" => "Price",
                        "ordernumber" => 7,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "whoshoudpay",
                        "label" => "بدهکار",
                        "labelsec" => "National Code",
                        "ordernumber" => 8,
                        "isimage" => 0,
                    ],
                    [
                        "field" => "receptionslist",
                        "label" => "پذیرش ها",
                        "labelsec" => "Reception List",
                        "ordernumber" => 9,
                        "isimage" => 0,
                    ],
                ],
            ],
            [
                "fk_menu" => 143,
                "columns" => [
                    [
                        "field" => "pk_gatewaytransaction",
                        "label" => "شناسه",
                        "labelsec" => "ID",
                        "ordernumber" => 1,
                        "isimage" => 1,
                    ],
                    [
                        "field" => "fk_reception",
                        "label" => "شماره پذیرش",
                        "labelsec" => "Reception ID",
                        "ordernumber" => 2,
                        "isimage" => 1,
                    ],
                    [
                        "field" => "customerfullname",
                        "label" => "نام مشتری",
                        "labelsec" => "Customer Name",
                        "ordernumber" => 3,
                        "isimage" => 1,
                    ],
                    [
                        "field" => "amount",
                        "label" => "مقدار",
                        "labelsec" => "Amount",
                        "ordernumber" => 4,
                        "isimage" => 2,
                    ],
                    [
                        "field" => "status",
                        "label" => "وضعیت",
                        "labelsec" => "Status",
                        "ordernumber" => 5,
                        "isimage" => 1,
                    ],
                    [
                        "field" => "jalalipaidatdate",
                        "label" => "تاریخ پرداخت",
                        "labelsec" => "Paid Date",
                        "ordernumber" => 7,
                        "isimage" => 1,
                    ],
                    [
                        "field" => "paidattime",
                        "label" => "زمان پرداخت",
                        "labelsec" => "Paid Time",
                        "ordernumber" => 8,
                        "isimage" => 1,
                    ],
                    [
                        "field" => "refid",
                        "label" => "کد رهگیری",
                        "labelsec" => "Ref ID",
                        "ordernumber" => 9,
                        "isimage" => 1,
                    ],
                    [
                        "field" => "gatewaytransactiontype",
                        "label" => "نوع",
                        "labelsec" => "Type",
                        "ordernumber" => 10,
                        "isimage" => 1,
                    ],
                ],
            ],

        ];

        foreach ($menuCulumns as $menuColumn) {
            $fk_menu = $menuColumn['fk_menu'];
            foreach ($menuColumn['columns'] as $column) {
                s_menucolumn::firstOrCreate(
                    [
                        'fk_menu' => $fk_menu,
                        'field' => $column['field'],
                        "isimage" => 0,
                    ],

                    [
                        'label' => $column['label'],
                        'labelsec' => $column['labelsec'],
                        'ordernumber' => $column['ordernumber'],
                        'created_at' => now(),
                        'updated_at' => now()
                    ]
                );
            }
        }
    }
}
