<?php

namespace Formgen\Form;

use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

class AddUserValidator implements InputFilterAwareInterface
{
    protected $inputFilter;

    public function setInputFilter(InputFilterInterface $inputFilter)
    {
        throw new \Exception("Not used");
    }

    public function getInputFilter()
    {
        if (!$this->inputFilter) {
            $inputFilter = new InputFilter();
            $factory = new InputFactory();

            $inputFilter->add($factory->createInput([
                'name' => 'hidden',
                'required' => false,
            ]));

            $inputFilter->add($factory->createInput([
                'name' => 'text',
                'required' => true,
                'filters' => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name' => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min' => '3',
                            'max' => '10',

                        ),
                    ),
                ),
            ]));

            $inputFilter->add($factory->createInput([
                'name' => 'testtt',
                'required' => true,
                'filters' => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array (
                        'name' => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min' => '3',
                            'max' => '10',
                        ),
                    ),

                ),
            ]));

            $inputFilter->add($factory->createInput([
                'name' => 'number',
                'required' => 'false',
                'filters' => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array (
                        'name' => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min' => '1',
                            'max' => '100',

                        ),
                    ),
                    array (
                        'name' => 'Digits',
                    ),

                ),
            ]));

            $inputFilter->add($factory->createInput([
                'name' => 'email',
                'required' => true,
                'filters' => [
                    ['name' => 'StripTags'],
                    ['name' => 'StringTrim'],
                ],
                'validators' => [
                    [
                        'name' => 'EmailAddress',
                        'options' => [
                            'encoding' => 'UTF-8', 'min'=>5, 'max'=>255,
                            'messages' => array(
                                'emailAddressInvalidFormat' => 'Email address format is not invalid'
                            )
                        ],
                    ],[
                        'name' => 'NotEmpty',
                        'break_chain_on_failure' => true,
                        'options' => [
                            'messages' => array(
                                'isEmpty' => 'Email address is required'
                            )
                        ],
                    ],
                ],
            ]));

            $inputFilter->add($factory->createInput([
                                                    'name' => 'password1',
                                                    'filters' => array(
                                                        array('name' => 'StripTags'),
                                                        array('name' => 'StringTrim'),
                                                    ),
            'validators' => array(
                array (
                    'name' => 'StringLength',
                    'options' => array(
                        'encoding' => 'UTF-8',
                        'min' => '1',
                        'max' => '122',
                    ),
        ))
        ]));

            $inputFilter->add($factory->createInput([
                                                    'name' => 'password_verify',
                                                    'filters' => array(
                                                        array('name' => 'StripTags'),
                                                        array('name' => 'StringTrim'),
                                                    ),
                                                    'validators' => array(
                                                        array (
                                                            'name' => 'identical',
                                                            'options' => array(
                                                                'token' => 'password1',
                                                            ),
                                                        ),

                                                    ),
                                                    ]));

            $inputFilter->add($factory->createInput([
                                                    'name' => 'radio',
                                                    'filters' => array(
                                                        array('name' => 'StripTags'),
                                                        array('name' => 'StringTrim'),
                                                    ),
                                                    'validators' => array(
                                                    ),
                                                    ]));

            $this->inputFilter = $inputFilter;
        }

        return $this->inputFilter;
    }
}