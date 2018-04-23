<?php

class sta_status {

	public $sta_id = null;

	public $sta_name = null;

	public $sta_alias = null;

	public $sta_type = null;

	public $sta_table = null;

	public $sta_status = null;

	public function __construct($sta_id = null, $sta_name = null, $sta_alias = null, $sta_type = null, $sta_table = null, $sta_status = null) {
		$this->sta_id = $sta_id;
		$this->sta_name = $sta_name;
		$this->sta_alias = $sta_alias;
		$this->sta_type = $sta_type;
		$this->sta_table = $sta_table;
		$this->sta_status = $sta_status;
	}
}