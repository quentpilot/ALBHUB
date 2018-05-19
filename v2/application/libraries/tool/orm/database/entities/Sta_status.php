<?php

class Sta_status extends Datatable_database {

	public $sta_id = 0;

	public $sta_name = null;

	public $sta_alias = null;

	public $sta_type = null;

	public $sta_table = null;

	public $sta_status = 0;

	public function __construct(int $sta_id = 0, string $sta_name = null, string $sta_alias = null, string $sta_type = null, string $sta_table = null, int $sta_status = 0) {
		$this->sta_id = $sta_id;
		$this->sta_name = $sta_name;
		$this->sta_alias = $sta_alias;
		$this->sta_type = $sta_type;
		$this->sta_table = $sta_table;
		$this->sta_status = $sta_status;
	}
}