<?php

namespace App\Controller\Admin;

use App\Entity\SweatShirts;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichImageType;

class SweatShirtsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return SweatShirts::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
           
            TextField::new('name'),
            SlugField::new('slug')->setTargetFieldName('name'),
            TextField::new('size'),
            MoneyField::new('price')->setCurrency('EUR'),
            TextField::new('attachmentFile')->setFormType(VichImageType::class)->onlyWhenCreating(),
            ImageField::new('attachment')->setBasePath('/uploads/attachments')->onlyOnIndex(),
            AssociationField::new('category'),
        ];
    }
 
}
