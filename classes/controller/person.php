<?php

namespace Contacts;


class Controller_Person extends \Controller_Template 
{

	public function action_index()
	{
		$data['people'] = Model_Person::find('all');
		$this->template->title = "People";
		$this->template->content = \View::forge('person/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and \Response::redirect('Person');

		if ( ! $data['person'] = Model_Person::find($id))
		{
			\Session::set_flash('error', 'Could not find person #'.$id);
			\Response::redirect('Person');
		}

		$this->template->title = "Person";
		$this->template->content = \View::forge('person/view', $data);

	}

	public function action_create()
	{
		if (\Input::method() == 'POST')
		{
			$val = Model_Person::validate('create');
			
			if ($val->run())
			{
				$person = Model_Person::forge(array(
					'first' => \Input::post('first'),
					'last' => \Input::post('last'),
					'email' => \Input::post('email'),
				));

				$person->groups = array();
				if (is_array(\Input::post('groups')))
				{
					foreach (\Input::post('groups') as $group_id) 
					{
						$person->groups[] = Model_Group::find($group_id);
					}
				}

				if ($person and $person->save())
				{
					\Session::set_flash('success', 'Added person #'.$person->id.'.');

					\Response::redirect('person');
				}

				else
				{
					\Session::set_flash('error', 'Could not save person.');
				}
			}
			else
			{
				\Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "People";
		$this->template->set_global('groups', Model_Group::find('all'), false);
		$this->template->content = \View::forge('person/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and \Response::redirect('Person');

		if ( ! $person = Model_Person::find($id))
		{
			\Session::set_flash('error', 'Could not find person #'.$id);
			\Response::redirect('Person');
		}

		$val = Model_Person::validate('edit');

		if ($val->run())
		{
			$person->first = \Input::post('first');
			$person->last = \Input::post('last');
			$person->email = \Input::post('email');

			$person->groups = array();
			if (is_array(\Input::post('groups')))
			{
				foreach (\Input::post('groups') as $group_id) 
				{
					$person->groups[] = Model_Group::find($group_id);
				}
			}

			

			if ($person->save())
			{
				\Session::set_flash('success', 'Updated person #' . $id);

				\Response::redirect('person');
			}

			else
			{
				\Session::set_flash('error', 'Could not update person #' . $id);
			}
		}

		else
		{
			if (\Input::method() == 'POST')
			{
				$person->first = $val->validated('first');
				$person->last = $val->validated('last');
				$person->email = $val->validated('email');

				\Session::set_flash('error', $val->error());
			}

			$this->template->set_global('groups', Model_Group::find('all'), false);
			$this->template->set_global('person', $person, false);
		}

		$this->template->title = "People";
		$this->template->content = \View::forge('person/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and \Response::redirect('Person');

		if ($person = Model_Person::find($id))
		{
			$person->delete();

			\Session::set_flash('success', 'Deleted person #'.$id);
		}

		else
		{
			\Session::set_flash('error', 'Could not delete person #'.$id);
		}

		\Response::redirect('person');

	}


}