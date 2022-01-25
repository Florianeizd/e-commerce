<?php

namespace App\Form;

use App\Entity\Article;
<<<<<<< HEAD
use App\Entity\Category;
=======
use App\Entity\Categorie;
>>>>>>> fe50d38f4974b3564decc53b7efdfa4275c5d034
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
<<<<<<< HEAD
            ->add('category', EntityType::class, [
                'class' => Category::class,
                'choice_label' => 'titre',
                'label' => 'Catégorie',
=======
            ->add('categorie', EntityType::class, [
                'class' => Categorie::class,
                'choice_label' => 'titre'
>>>>>>> fe50d38f4974b3564decc53b7efdfa4275c5d034
            ])
            ->add('description')
            ->add('prix')
            ->add('attachments', CollectionType::class, [
<<<<<<< HEAD
                'entry_type' => AttachmentType::class,
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false,
                'row_attr' => ['class' => 'd-none'],
=======
                'entry_type' => AttachmentType::class, 
                'allow_add' => true,
>>>>>>> fe50d38f4974b3564decc53b7efdfa4275c5d034
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Article::class,
        ]);
    }
<<<<<<< HEAD
}
=======
}
>>>>>>> fe50d38f4974b3564decc53b7efdfa4275c5d034
